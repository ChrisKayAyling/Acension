#!/usr/bin/env bash

echo "Acension Framework Builder";
echo "--------------------------";


while getopts n:d:h: flag
do
    case "${flag}" in
        n)
            classname=${OPTARG}
            echo "Creating new area of functionality: $classname"
            echo ""
            echo "----------"
            echo " New area of functionality can be accessed via: /$classname"
            echo " ";
            echo " Creating new class structure "

            if [ ! -d "lib/$classname" ]
            then {
                mkdir "lib/$classname"
                mkdir "lib/$classname/Controller"
                mkdir "lib/$classname/Interfaces"
                mkdir "lib/$classname/Repository"
                cp "build/framework/templates/class/Controller/Controller.php" "lib/$classname/Controller/Controller.php"
                sed -i "s/{{Template}}/$classname/" "lib/$classname/Controller/Controller.php"

                cp "build/framework/templates/class/Interfaces/IRepository.php" "lib/$classname/Interfaces/IRepository.php"
                sed -i "s/{{Template}}/$classname/" "lib/$classname/Interfaces/IRepository.php"

                cp "build/framework/templates/class/Repository/Repository.php" "lib/$classname/Repository/Repository.php"
                sed -i "s/{{Template}}/$classname/" "lib/$classname/Repository/Repository.php"


                # Copy Angular Controller

                cp "build/framework/templates/javascript/controller.js" "public_html/app/controllers/$classname.js"
                sed -i "s/{{Template}}/$classname/" "public_html/app/controllers/$classname.js"

                # Copy Templates

                mkdir "templates/$classname"

                cp "build/framework/templates/twig/main.twig" "templates/$classname/main.twig"
                sed -i "s/{{Template}}/$classname/" "templates/$classname/main.twig"

                }
            fi;;

        d) classname=${OPTARG};;
        h)
            echo ""
            echo "Help"
            echo ""
            echo " Available Flags:"
            echo "    -h    This menu that provides information about what commands can be used with the builder."
            echo "    -n    Create a new route and classes by passing a name of route  e.g. ./ascend -n CardPayment."
            echo "    -d    Delete a route into the system and all artifacts relating to it e.g. ./ascend -d CardPayment."
            echo ""
            echo " End of menu ";;
    esac
done

