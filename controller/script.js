//animations on scroll
window.onscroll = function(){
    displayFeatured(), displayAllItems(), displayPopular(), displayTotop();
}
/* submit appointment form */
/* $(document).ready(function(){
    $("#book").click(function(){
        let customer_name = document.getElementById("customer_name").value;
        let customer_phone = document.getElementById("customer_phone").value;
        let customer_mail = document.getElementById("customer_mail").value;
        let service = document.getElementById("service").value;
        let appointment_date = document.getElementById("appointment_date").value;
        let appointment_address = document.getElementById("appointment_address").value;
        let notes = document.getElementById("notes").value;
        // alert(notes);

        $.ajax({
            type: "POST",
            url: "appointment.php",
            data: {customer_name:customer_name, customer_phone:customer_phone, customer_mail:customer_mail, service:service, appointment_date:appointment_date, appointment_address:appointment_address, notes:notes},
            success: function(response){
                $(".result").html(response);
            }
        });
        // $(".appointment_page").show();
        return false;
    })
}) */

//display home page after intro
/* setTimeout(function(){
    $(".main").show();
    $(".loader").hide();
}, 3000) */
//display login on desktop page
$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
    });
    $("#bannerContents, main").click(function(){
        $(".login_option").hide();
    })
});
//display login on mobile
// $(document).ready(function(){
//     $("#mobile_menu #loginDiv").click(function(){
//         $("#mobile_menu .login_option").toggle();
//         // console.log("Working");
//     });
//     // $("#bannerContents, main").click(function(){
//     //     $(".login_option").hide();
//     // })
// });

/* display mobile menu */
$(document).ready(function(){
    $(".menu_icon").click(function(){
        $("#mobile_menu").toggle();
    });
    $("#banner, main, #existence, #hero #mission_vision").click(function(){
        $("#mobile_menu").hide();
        
    })
})
//display login first prompt
function loginFirst(){
    $("#loginPrompt").show();
}
// close login first prompt box
$(document).ready(function(){
    $("#closeBox").click(function(){
        $("#loginPrompt").hide();
    })
})
//display login first prompt when user cick on categories
$(document).ready(function(){
    $("#index_nav ul li").click(function(){
        loginFirst();
    })
})
/* swap video and photos display */
//method 1
/* $(document).ready(function(){
    $("#photoBtn").click(function(){
        $("#photos").show();
        $("#video").hide();
    });
    $("#videoBtn").click(function(){
        $("#photos").hide();
        $("#video").css("display", "flex");
    })
}) */
//method 2
function showMedia(media){
    document.querySelector("#video").style.display = "none";
    document.querySelector("#photos").style.display = "none";
    document.querySelector(`#${media}`).style.display = "flex";
}
//get buttons
document.addEventListener("DOMContentLoaded",function(){
    document.querySelectorAll(".mediaBtns button").forEach(button=>{
        button.onclick = function(){
            showMedia(this.dataset.media);
        }
    })
})
//display more featured items
$(document).ready(function(){
    $("#view_more").click(function(){
        $(".featured").css("height", "auto");
        $("#view_more").hide();
        $("#show_less").show();
    })
})
//display less featured items
$(document).ready(function(){
    $("#show_less").click(function(){
        $(".featured").css("height", "270px");
        $("#view_more").show();
        $("#show_less").hide();

    })
})
//display more general items
$(document).ready(function(){
    $("#more").click(function(){
        $(".all_items").css("height", "auto");
        $("#more").hide();
        $("#less").show();
    })
})
//display less general items
$(document).ready(function(){
    $("#less").click(function(){
        $(".all_items").css("height", "280px");
        $("#more").show();
        $("#less").hide();

    })
})
//display more popular items
$(document).ready(function(){
    $("#more_popular").click(function(){
        $(".popular_items").css("height", "auto");
        $("#more_popular").hide();
        $("#less_popular").show();

    })
})
//display less popular items
$(document).ready(function(){
    $("#less_popular").click(function(){
        $(".popular_items").css("height", "280px");
        $("#more_popular").show();
        $("#less_popular").hide();

    })
})


//display appointment form
$(document).ready(function(){
    $(".appointment").click(function(){
        $(".appointment_page").show();
    });
    $("#close").click(function(){
        $(".appointment_page").hide();
    })
})
//show item information
function showItems(item_id){
    window.open("item_info.php?item="+item_id, "_parent");
    return;
}

//add item to cart
/* $(document).ready(function(){
    $("#add_to_cart").click(function(){
        let cart_item_name = document.getElementById('cart_item_name').value;
        let cart_item_price = document.getElementById('cart_item_price').value;
        let cart_item_restaurant = document.getElementById('cart_item_restaurant').value;
        let customer_email = document.getElementById('customer_email').value;
        
        
        //   alert("work");
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {cart_item_name:cart_item_name, cart_item_price:cart_item_price, cart_item_restaurant:cart_item_restaurant,customer_email:customer_email},
            success: function(response){
                $(".info").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        // return false;
    // })

// }) */

//display update user details by clicking on edit address
$(document).ready(function(){
    $("#editDetails").click(function(){
        // alert('hello');
        $(".update_details").show();
        $(".profile_details").hide();
        $("#close_update").click(function(){
            $(".profile_details").show();
            $(".update_details").hide();
        })
    })
})
//display change password
$(document).ready(function(){
    $("#changePasword").click(function(){
        // alert('hello');
        $(".change_password").toggle();
       
    })
})


//multiply item on shopping cart
function getCartTotal(){
    let itemTotal = document.getElementById("itemTotal").innerText;
    let discount = document.getElementById("discount").innerText;
    let delivery = document.getElementById("delivery").innerText;
    let grandTotal = document.getElementById("grandTotal");
    grandTotal.innerText = parseInt(itemTotal) + parseInt(discount) + parseInt(delivery);
    // alert(delivery);
}
getCartTotal();

//delete item from cart
function removeCartItem(cart_id){
    let remove_item = confirm("Do you want to remove this item from cart?");
    if(remove_item){
        window.open('remove_cart_item.php?cart_item='+cart_id, '_parent');
        return;
    }
    
}

//hide suuccess message
// setTimeout()
//get total amount of items in cart
/* function cartItemTotal(){
    let totalPrice = document.querySelectorAll('.totalprice');

} */
// close error pop up box from cart
$(document).ready(function(){
    $("#close_error").click(function(){
        $(".error_box").hide();
    })
})

//display featured items on scroll
function displayFeatured(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.getElementById("featured").style.display = "block";
    }else{
        document.getElementById("featured").style.display = "none";
    }
}
//display shop items on scroll
function displayAllItems(){
    if(document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000){
        document.getElementById("all_items").style.display = "block";
    }else{
        document.getElementById("all_items").style.display = "none";
    }
}
//display popular items on scroll
function displayPopular(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("popular").style.display = "block";
    }else{
        document.getElementById("popular").style.display = "none";
    }
}

//display mission and vision on scroll
/* function displayMission(){
    if(document.body.scrollTop > 500 || document.documentElement.scrollTop > 500){
        document.getElementById("mission_vision").style.display = "block";
    }else{
        document.getElementById("mission_vision").style.display = "none";
    }
} */

//display to top button{
function displayTotop(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.querySelector(".toTop").style.display = "block";
    }else{
        document.querySelector(".toTop").style.display = "none";
    }
}

//view notification details
function viewNotification(notify_id){
    window.open("not_details.php?notify_id="+notify_id, "_parent");
    return;
}
/* $(document).ready(function(){
    $("#subscribe").click(function(){
        let subscribe_email = document.getElementById("subscribe_email").value;
        alert(subscribe_email);
        /* $.ajax({
            type: "POST",
            url: "subscribe.php",
            data: {subscribe_email:subscribe_email},
            success: function(response){
                $(".result").html(response);
            }
        }) 
        return false;
    })
    
}) */


