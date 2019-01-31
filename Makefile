preview:
	sam local start-api --region us-east-1

deploy:
	php artisan config:clear
	sam package \
        --output-template-file .stack.yaml \
        --region us-east-1 \
        --s3-bucket bref-demo-laravel
	sam deploy \
        --template-file .stack.yaml \
        --capabilities CAPABILITY_IAM \
        --region us-east-1 \
        --stack-name bref-demo-laravel
