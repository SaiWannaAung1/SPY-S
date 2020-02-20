
function addToCart(id) {
    var ary=   JSON.parse(localStorage.getItem("items")) ;
    if( ary == null){
        var itemAry = [id];
        localStorage.setItem("items",JSON.stringify(itemAry));
    }else{
        $con = ary.indexOf(id);
        if($con == -1){
            ary.push(id);
            localStorage.setItem("items",JSON.stringify(ary));

        }

    }
    alert("Item already Add to Cart!");
    console.log(ary)
    showCartItem();
}

function showCartItem() {
    let ary = JSON.parse(localStorage.getItem("items"));
    if (ary != null){
        $("#cart_count").html(ary.length);
    }else {
        $("#cart_count").html(0);
    }

}

function getCartItem() {
    let ary = JSON.parse(localStorage.getItem("items"));
    return ary
}
showCartItem();
