#!/bin/bash

# Create directories
mkdir -p public/assets app/{controllers/{front,back},models,views,core} config logs vendor

# Create files
touch public/{index.php,.htaccess}
touch app/core/{Router.php,Controller.php,Model.php,View.php,Database.php,Auth.php,Validator.php,Security.php,Session.php}
touch config/{config.php,routes.php}
touch .env composer.json .gitignore

# Output message