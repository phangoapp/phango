# For apigen

vendor/bin/apigen generate --source vendor/phangoapp/phalibs --source vendor/phangoapp/phamodels/ --source vendor/phangoapp/pharouter/ --source vendor/phangoapp/phaview/ --source vendor/phangoapp/phautils/ --destination docs

# For phpdocumentor 2

vendor/bin/phpdoc -d vendor/phangoapp/phalibs -d vendor/phangoapp/phamodels/ -d vendor/phangoapp/pharouter/ -d vendor/phangoapp/phaview/ -d vendor/phangoapp/phautils/ -t docs/
