
function directToBuy(){
    document.location.href = './Buy.php?id=1';
}

function onAdd(productId,userId){
   // console.log(productId + " "+ userId +" "+ sessionID);
   // console.log('INSERT BERHASIL!');
    if(userId !== sessionID){ //Validate 
        alert("HACKING DETECTED!");
        window.location.href = "./index.php";
        return;
    }else if(userId === undefined){
        alert("You Must Login First!");
        window.location.href = "./Login.php";
        return;
    }

    var obj = {"useID":userId, "procID":productId};
    $.ajax({
        url: "./controllers/cartController.php",
        type: "POST",
        data: obj, 
        success: function(data){
            
            data = Number.parseInt(data);
            
            if(data === 400){
                alert('Bad Request!');
                document.location.href = "./index.php";
            }else if(data === 200){
          
                count++;
          
              document.getElementById("countCart").innerHTML=count;
              
            }
          
        },
    });

}


function onShow(userId){
    if(userId !== sessionID){ //Validate 
        alert("HACKING DETECTED!");
        window.location.href = "./index.php";
        return;
    }else if(userId === undefined){
        alert("You Must Login First!");
        window.location.href = "./Login.php";
        return;
    }


    var obj = {"UseID":userId};
    $.ajax({
        url: "./controllers/getCartController.php",
        type: "POST",
        data: obj,

        success:function(data){
             if(Number.parseInt(data) === 400 || data === "query gagal"){
                alert('Bad Request!');
                document.location.href = "./index.php";
            }else{
                // console.log(data);
                document.getElementById("listGroup").innerHTML = data;
            }

        }

    })
}
    function clearAll(userId){
        if(userId !== sessionID){ //Validate 
        alert("HACKING DETECTED!");
        window.location.href = "./index.php";
        return;
    }else if(userId === undefined){
        alert("You Must Login First!");
        window.location.href = "./Login.php";
        return;
    }


    var obj = {"UseID":userId};
    $.ajax({
        url: "./controllers/clearMyCart.php",
        type: "POST",
        data: obj,

        success:function(data){
             if(Number.parseInt(data) === 400 || data === "query gagal"){
                alert('Bad Request!');
                document.location.href = "./index.php";
            }else{
                // console.log(data);
                count = 0;
                document.getElementById("listGroup").innerHTML = "";
                document.getElementById("countCart").innerHTML = "0"; 
            }

        }

    });

}
