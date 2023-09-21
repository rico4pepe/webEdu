function adminGuide($userrole){

        if($userrole != 1){
                echo "Acccess Denied"
        }

}

function staffGuide($userrole){

if($userrole != 4){
        echo "Acccess Denied"
}

}

function studentGuide($userrole){

if($userrole ){
        echo "Acccess Denied"
}

}