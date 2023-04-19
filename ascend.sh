#!/bin/bash

echo "Acension Framework Builder";
echo "--------------------------";
echo " Available Flags:"
echo "    -h    This menu that provides information about what commands can be used with the builder."
echo "    -n    Create a new route and classes by passing a name of route  e.g. ./ascend -n CardPayment."
echo "    -d    Delete a route into the system and all artifacts relating to it e.g. ./ascend -d CardPayment."


while getopts n:d:h: flag
do
    case "${flag}" in
        n)
            classname=${OPTARG}
            echo "Scaffholding functionality: $classname"
            echo ""
            echo "----------"
            echo " You can now access scaffholded area via: /$classname"
            echo " ";
            echo " Creating new class structure "

            if [ ! -d "lib/$classname" ]
            then {
                mkdir "lib/$classname"
                mkdir "lib/$classname/Controller"
                mkdir "lib/$classname/Interfaces"
                mkdir "lib/$classname/Repository"
                cp "builder/templates/Example/Controller/Controller.php" "lib/$classname/Controller/Controller.php"
                sed -i "s/{Example}/$classname/" "lib/$classname/Controller/Controller.php"

                cp "builder/templates/Example//Interfaces/IRepository.php" "lib/$classname/Interfaces/IRepository.php"
                sed -i "s/{Example}/$classname/" "lib/$classname/Interfaces/IRepository.php"

                cp "builder/templates/Example//Repository/Repository.php" "lib/$classname/Repository/Repository.php"
                sed -i "s/{Example}/$classname/" "lib/$classname/Repository/Repository.php"

                # Copy Templates

                mkdir "templates/$classname"

                cp "builder/templates/ExampleTwig/Example.twig" "templates/$classname/default.twig"
                sed -i "s/{Example}/$classname/" "templates/$classname/default.twig"

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

