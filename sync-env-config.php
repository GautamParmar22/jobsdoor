#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Usage: php sync-env-config.php staging

if ($argc < 2) {
    echo "❌ Usage: php sync-env-config.php <target_env>\n";
    exit(1);
}

$targetEnv = $argv[1];
$baseDir   = __DIR__ . '/config';
$localDir  = "$baseDir/local";
$targetDir = "$baseDir/$targetEnv";

if (!is_dir($targetDir)) {
    echo "❌ Target directory '$targetDir' does not exist.\n";
    exit(1);
}

echo "🔄 Syncing configs from 'local' → '$targetEnv'\n";

// Process files recursively
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($localDir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

foreach ($iterator as $srcFile) {
    $relativePath = str_replace($localDir . DIRECTORY_SEPARATOR, '', $srcFile->getPathname());
    $targetPath = $targetDir . DIRECTORY_SEPARATOR . $relativePath;

    if (is_dir($srcFile)) {
        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0755, true);
        }
        continue;
    }

    if (!file_exists($targetPath)) {
        echo "➕ Copying missing file: $relativePath\n";
        @mkdir(dirname($targetPath), 0755, true);
        copy($srcFile, $targetPath);
        continue;
    }

    echo "🔍 Checking $relativePath...\n";

    $localConfig  = include $srcFile;
    $targetConfig = include $targetPath;

    $missing = array_diff_key_recursive($localConfig, $targetConfig);

    if (empty($missing)) {
        echo "    ✅ No missing keys.\n";
        continue;
    }

    echo "    ➕ Merging missing keys:\n";
    $mergedConfig = array_replace_recursive($targetConfig, $missing);

    foreach (get_flat_keys($missing) as $k) {
        echo "      - $k\n";
    }

    $exported = "<?php\n\nreturn " . var_export_formatted($mergedConfig) . ";\n";
    file_put_contents($targetPath, $exported);
}

echo "✅ Sync complete.\n";

// ------------------ HELPERS -----------------------

function array_diff_key_recursive(array $array1, array $array2): array {
    $diff = [];

    foreach ($array1 as $key => $value) {
        if (!array_key_exists($key, $array2)) {
            $diff[$key] = $value;
        } elseif (is_array($value) && is_array($array2[$key])) {
            $nestedDiff = array_diff_key_recursive($value, $array2[$key]);
            if (!empty($nestedDiff)) {
                $diff[$key] = $nestedDiff;
            }
        }
    }

    return $diff;
}

function get_flat_keys(array $array, string $prefix = ''): array {
    $keys = [];

    foreach ($array as $key => $value) {
        $fullKey = $prefix ? "$prefix.$key" : $key;

        if (is_array($value)) {
            $keys = array_merge($keys, get_flat_keys($value, $fullKey));
        } else {
            $keys[] = $fullKey;
        }
    }

    return $keys;
}

function var_export_formatted(array $expression, int $indent = 0): string {
    $indentStr = str_repeat('    ', $indent);
    $output = "[\n";

    foreach ($expression as $key => $value) {
        $output .= $indentStr . '    ' . var_export($key, true) . ' => ';
        if (is_array($value)) {
            $output .= var_export_formatted($value, $indent + 1);
        } else {
            $output .= var_export($value, true);
        }
        $output .= ",\n";
    }

    $output .= $indentStr . "]";
    return $output;
}
