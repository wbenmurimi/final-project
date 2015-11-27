/* u is url */
/* function by Mr Aelaf Dafla */
var myurl = "model/main.php?";
var currentCity = "";
function sendRequest(u) {
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj = $.ajax({url: u, async: false});
    //Convert the JSON string to object
    var result = $.parseJSON(obj.responseText);
    return result;	//return object
  }

  function hide(){
    $(".post_area").show();
    for (var i = 0; i < arguments.length; i++) {

      var input = arguments[i];
        $('#'+input).addClass('hide'); //jquery way
      }

    }
    function showDiv(input){
    // alert("clicked")
    $('#'+input).removeClass('hide');
        $('#'+input).show(); //jquery way

      }
      function showAndHide(input){
    // alert("clicked")
    $('#'+input).removeClass('hide');
        $('#'+input).show(); //jquery way

      }


      function Login(){
        /*username*/
        var user_name = $("#username").val();
        /*password*/
        var pass_word = $("#password").val();

        /* empty username */
        if(user_name.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty username<i class="material-icons">close</i></div>';
          return
        }
        if(pass_word.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty password<i class="material-icons">close</i></div>';
          return;
        }
        
        var strUrl = myurl+"cmd=1&username="+user_name+"&password="+pass_word;
        prompt("url",strUrl);
        var objResult = sendRequest(strUrl);
        var errorArea = document.getElementById("login_error_area");
        document.getElementById("login_error_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
        if(objResult.result == 0) {
          document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
          return;
        }
        window.location.href = "home.html";
      }



      function getUser(){
        var strUrl = myurl+"cmd=5";
        var objResult = sendRequest(strUrl);

        if(objResult.result == 0){
          alert(objResult.message);
          return;
        }
        document.getElementById("username").innerHTML=objResult.message;

      }

      function addUser(){

        /*password*/
        var password = $("#user_pass").val();
        /*username*/
        var user_name = $("#user_name").val();

        /*email*/
        var yeargroup = $("#year_group").val();
        /*phone*/
        var phone = $("#user_phone").val();

        /* empty username */
        if(user_name.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty Username field<i class="material-icons">close</i></i></div>';
          return
        }
        /* empty password */
        if(password.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty password field<i class="material-icons">close</i></div>';
          return;
        }
        /* empty year group */
        if(yeargroup.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty year group Field<i class="material-icons">close</i></div>';
          return;
        }
        /* empty phone */
        if(phone.length == 0){
          document.getElementById("error_area").innerHTML = '<div class="chip red white-text">Empty Phone Field<i class="material-icons">close</i></div>';
          return;
        }
        var strUrl = myurl+"cmd=2&username="+user_name+"&password="+password+"&year="+yeargroup+"&phone="+phone;
   // prompt("url",strUrl);
   var objResult = sendRequest(strUrl);
   var errorArea = document.getElementById("error_area");
   document.getElementById("error_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
   if(objResult.result == 0) {
    document.getElementById("error_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }
  $("#user_name").val('');
  $("#user_pass").val('');
  $("#user_phone").val('');
  $("#year_group").val('');
  document.getElementById("error_area").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="fa fa-remove"></i></div>';

    // window.location.href = "index.html";
  }

/**
Adding a new post
*/

function addPost(){

  var name = $("#event_name").val();
  var description = $("#event_description").val();
  var e_date = $("#event_date").val();
  var e_poster = $("#event_poster").val();

  
  if(name.length == 0){
    document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';
    
    return;
  }
  if(description.length == 0){
    document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
    return;
  }
  if(e_date.length == 0){
    document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Date<i class="material-icons">close</i></div>';
    return;
  }
  if(e_poster.length == 0){
    document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Poster<i class="material-icons">close</i></div>';
    return
  }
  
  var strUrl = myurl+"cmd=4&name="+name+"&description="+description+"&date="+e_date+"&poster="+e_poster;
  prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  document.getElementById("add_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  if(objResult.result == 0) {
    document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  $("#event_name").val('');
  $("#event_description").val('');
  $("#event_date").val('');
  $("#event_poster").val('');

  document.getElementById("add_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

// location.reload();
}


/**
* get all equipment
*/

function getPosts(){
  var strUrl = myurl+"cmd=5";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);

   if(objResult.result == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    for(i=1;i<objResult.post.length;i++){


      var li = $('<li></li>');
      li.html('<div class="col s12 m12 post_area "><div class=" grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="image/4.jpg" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">'+objResult.post[i].event_name +' '+ objResult.post[i].event_time+' '+ objResult.post[i].description+'<div class=""> Posted on: '+ objResult.post[i].post_time+' </br> By: '+ objResult.post[i].posted_by+' .</div> </span><span class="styleComments"> <a><p class="post_likes right"><i class="fa fa-thumbs-o-up" onclick="addLikes(this)"></i></br>20</p></a><a><p class="bold" onclick="getPostComments(this)">Comments<i class="fa fa-commenting-o"></i></p></a></span><div id="commenting_area" class=""><div class="input-field col s12 m10"><input id="comment" type="text" class="validate" autocomplete="off"><label for="comment">Comment</label></div><div class="col s12 m12 save_post_area "><button id="post_comment_btn" onclick="addComment()" type="submit" class="btn waves-effect wave-dark add_comment_btn blue right">Post</button></div></div> </div></div> </div></div>');

      $("#post_area_li").append(li);

      var newId=objResult.post[i].post_id;
      alert(newId);
      if(document.getElementById('post_comment_btn')){
        var getClicked=document.getElementById('post_comment_btn');

        getClicked.setAttribute('id',newId);
        var id= getClicked.getAttribute('id');
        alert("Set: "+id);
      }
    }
  }
}

function addComment(newid){
  alert("Ading comment");
  var id= newid.getAttribute('id');
  alert(id);
  var comment = $("#comment").val();

  if(comment.length == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
    return;
  }

  var strUrl = myurl+"cmd=9&description="+comment+"+&id="+id;
  prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  document.getElementById("view_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  if(objResult.result == 0) {
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  $("#comment").val('');
  document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

}

function getPostComments(){
  alert("getting comments");
}

function addLikes(){
 alert("I like this"); 
}
/**
Function to delete the equipment
**/
function deleteEquipment(newid){
  var p= newid.getAttribute('id');
  var strUrl = myurl+"cmd=7&id="+p;
    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      document.getElementById("error_areap").innerHTML ='<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
      return;
    }
    if(objResult.result == 1){

     document.getElementById("error_areap").innerHTML ='<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
   }
 }

/**
Function to fetch one equipment
**/
function fetchEquipment(newid){
  $("contentArea").val("");
  var myid=document.getElementById("editInvent");
  
  var p= newid.getAttribute('id');
  var strUrl = myurl+"cmd=16&id="+p;
    // prompt("url", strUrl);
    var objResult = sendRequest(strUrl);

    if(objResult.result == 0){
      document.getElementById("error_areap").innerHTML ='<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
      return;
    }
    if(objResult.result == 1){

      showDiv("editInvent");
      $("#eeNumber").val(objResult.equipment[1].item_number);
      $("#eeCode").val(objResult.equipment[1].barcode_number);
      $("#eeName").val(objResult.equipment[1].item_name);
      $("#eeManu").val(objResult.equipment[1].manufacturer);  
      $("#eePrice").val(objResult.equipment[1].price);
      $("#eeQty").val(objResult.equipment[1].quantity);
      $("#edateBought").val(objResult.equipment[1].date_bought);
      $("#erepairDate").val(objResult.equipment[1].last_repair_date);
      $("#eeCond").val(objResult.equipment[1].condition);
      $("#eeLoc").val(objResult.equipment[1].e_location);
      $("#eeDep").val(objResult.equipment[1].department);

      document.getElementById("error_areap").innerHTML ='<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    }
  }

/**
Function to edit the equipment
**/
function editEquipment(){
  var name = $("#eeName").val();
  var quantity = $("#eeQty").val();
  var price = $("#eePrice").val();

  var number = $("#eeNumber").val();
  var barcode = $("#eeCode").val();
  var manufacturer = $("#eeManu").val();
  var repairDate = $("#erepairDate").val();
  var dateBought = $("#edateBought").val();
  var condition = $("#eeCond").val();
  var location = $("#eeLoc").val();
  var department = $("#eeDep").val();
  var userId = "benson";
  
  var strUrl = myurl+"cmd=6&number="+number+"&eName="+name+"&code="+barcode+"&manu="+manufacturer+
  "&repairDate="+repairDate+"&price="+price+"&dateBought="+dateBought+"&cod="+condition+
  "&loc="+location+"&dep="+department+"&uid="+userId+"&qty="+quantity;
// prompt("url",strUrl);
var objResult = sendRequest(strUrl);

if(objResult.result == 0){
  document.getElementById("error_areap").innerHTML ='<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  return;
}
if(objResult.result == 1){  
 document.getElementById("error_areap").innerHTML ='<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
}
}

function logout(){
 var strUrl = myurl+"cmd=3";
 prompt("url",strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
alert(objResult.message);
window.location.href = "index.html";

}

