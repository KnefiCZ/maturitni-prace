# maturitni-prace
 Práce k maturitě

# About the project
 This project is made for my final school exam

# Composer install
    Downloaded composer with command 
    composer reqire illuminate/database

    If you added some more classes in to the ./classes folder use command
    composer dumpautoload -o

    To connect the DB to website you will need to add this command lines to composer.json file
    "autoload": {
        "classmap": [
          "classes"
        ]
    }
