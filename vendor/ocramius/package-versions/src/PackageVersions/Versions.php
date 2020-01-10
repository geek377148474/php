<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = 'ccjian/php';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'catfan/medoo' => 'v1.7.2@b9dfce4046f3eb48a647ef72991bb65012f99376',
  'dealerdirect/phpcodesniffer-composer-installer' => 'v0.5.0@e749410375ff6fb7a040a68878c656c2e610b132',
  'doctrine/annotations' => 'v1.6.1@53120e0eb10355388d6ccbe462f1fea34ddadb24',
  'doctrine/cache' => 'v1.8.0@d768d58baee9a4862ca783840eca1b9add7a7f57',
  'doctrine/coding-standard' => '6.0.0@d33f69eb98b25aa51ffe3a909f0ec77000af4701',
  'doctrine/collections' => 'v1.6.2@c5e0bc17b1620e97c968ac409acbff28b8b850be',
  'doctrine/common' => 'v2.10.0@30e33f60f64deec87df728c02b107f82cdafad9d',
  'doctrine/dbal' => 'v2.9.2@22800bd651c1d8d2a9719e2a3dc46d5108ebfcc9',
  'doctrine/event-manager' => 'v1.0.0@a520bc093a0170feeb6b14e9d83f3a14452e64b3',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'doctrine/lexer' => '1.1.0@e17f069ede36f7534b95adec71910ed1b49c74ea',
  'doctrine/migrations' => '2.1.1@a89fa87a192e90179163c1e863a145c13337f442',
  'doctrine/orm' => 'v2.6.3@434820973cadf2da2d66e7184be370084cc32ca8',
  'doctrine/persistence' => '1.1.1@3da7c9d125591ca83944f477e65ed3d7b4617c48',
  'doctrine/reflection' => 'v1.0.0@02538d3f95e88eb397a5f86274deb2c6175c2ab6',
  'easyswoole/swoole-ide-helper' => '1.3.2@e759aeaa9bc89852a42c610d94ce4c65e6f5b8cf',
  'filp/whoops' => '2.4.1@6fb502c23885701a991b0bba974b1a8eb6673577',
  'google/protobuf' => 'v3.9.1@4bb1a332b47f618a0a21ad3cc9a43f1c4aaa5b62',
  'grpc/grpc' => '1.22.0@88235e786ef9b55fcb049f00c5c5202f8086a299',
  'inhere/php-validate' => 'v2.7.1@2426184320d07546951734dcfbd519472351656e',
  'jian/package' => 'v0.1.0@0f8445c8da7294a14c453453dbcd0d730de6d4ca',
  'monolog/monolog' => '2.0.0@68545165e19249013afd1d6f7485aecff07a2d22',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpoffice/phpexcel' => '1.8.2@1441011fb7ecdd8cc689878f54f8b58a6805f870',
  'phpstan/phpdoc-parser' => '0.3.5@8c4ef2aefd9788238897b678a985e1d5c8df6db4',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'slevomat/coding-standard' => '5.0.4@287ac3347c47918c0bf5e10335e36197ea10894c',
  'squizlabs/php_codesniffer' => '3.4.2@b8a7362af1cc1aadb5bd36c3defc4dda2cf5f0a8',
  'symfony/console' => 'v4.3.4@de63799239b3881b8a08f8481b22348f77ed7b36',
  'symfony/finder' => 'v4.3.4@86c1c929f0a4b24812e1eb109262fc3372c8e9f2',
  'symfony/polyfill-ctype' => 'v1.11.0@82ebae02209c21113908c229e9883c419720738a',
  'symfony/polyfill-mbstring' => 'v1.11.0@fe5e94c604826c35a32fa832f35bd036b6799609',
  'symfony/polyfill-php72' => 'v1.11.0@ab50dcf166d5f577978419edd37aa2bb8eabce0c',
  'symfony/polyfill-php73' => 'v1.12.0@2ceb49eaccb9352bff54d22570276bb75ba4a188',
  'symfony/service-contracts' => 'v1.1.6@ea7263d6b6d5f798b56a45a5b8d686725f2719a3',
  'symfony/stopwatch' => 'v4.3.4@1e4ff456bd625be5032fac9be4294e60442e9b71',
  'symfony/translation-contracts' => 'v1.1.5@cb4b18ad7b92a26e83b65dde940fab78339e6f3c',
  'symfony/validator' => 'v4.3.3@dbca6327b315d29653f826057ee5034ff234c587',
  'symfony/var-dumper' => 'v4.3.3@e4110b992d2cbe198d7d3b244d079c1c58761d07',
  'twig/twig' => 'v2.11.3@699ed2342557c88789a15402de5eb834dedd6792',
  'zendframework/zend-code' => '3.3.2@936fa7ad4d53897ea3e3eb41b5b760828246a20b',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'ccjian/php' => 'dev-master@0089c9767a90494d61cbe7c3d89c44366f89e71a',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
