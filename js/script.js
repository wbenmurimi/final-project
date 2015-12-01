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
    function toggleDiv(newid){
      // $(".commentDiv").hide();
      var isVisible = $( ".commentDiv" ).is( ":visible" );

      var isHidden = $( ".commentDiv" ).is( ":hidden" );

      if (isVisible) {
        alert("visible");
      };
      if (isHidden) {
        alert("hidden");
        var id= newid.getAttribute('id');
        getPostComments(id);
      };
      $(".commentDiv").slideToggle('slow');


    }
    function hide(input){
    // for (var i = 0; i < arguments.length; i++) {

    //     var input = arguments[i];
        $('#'+input).addClass('hide'); //jquery way
    // }

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
        // prompt("url",strUrl);
        var objResult = sendRequest(strUrl);
        var errorArea = document.getElementById("login_error_area");
        document.getElementById("login_error_area").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
        if(objResult.result == 0) {
          document.getElementById("login_error_area").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
          return;
        }
         alert("i'm here");
        var my_user_type=objResult.user[1].user_type;
        alert(my_user_type);

        if (my_user_type.localeCompare("admin")==0) {
          window.location.href ="admin.php"
        }
        else if (my_user_type.localeCompare("leader")==0) {
          window.location.href = "model/device.php";
        }
        else if (my_user_type.localeCompare("regular")==0) {
        window.location.href ="home.php"
        }
        
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
 var myForm=document.getElementById("my_post_form");
 var form=FormData(myForm);
 $.ajax({
    url: myurl+"cmd=4",
    type:"POST",
    data:form,
    contentType:false,
    processData:false,
    success:function(data){
      alert(data+" "+"message from request");
    },
    error:function(data){
      alert(data+" "+"message from request");
    }

 });

  // var name = $("#event_name").val();
  // var description = $("#event_description").val();
  // var e_date = $("#event_date").val();
  // var e_poster = $("#event_poster").val();

  
  // if(name.length == 0){
  //   document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';
    
  //   return;
  // }
  // if(description.length == 0){
  //   document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
  //   return;
  // }
  // if(e_date.length == 0){
  //   document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Date<i class="material-icons">close</i></div>';
  //   return;
  // }
  // if(e_poster.length == 0){
  //   document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">Empty Event Poster<i class="material-icons">close</i></div>';
  //   return
  // }
  
  // var strUrl = myurl+"cmd=4&name="+name+"&description="+description+"&date="+e_date+"&poster="+e_poster;
  // // prompt("url",strUrl);
  // var objResult = sendRequest(strUrl);
  // document.getElementById("add_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  // if(objResult.result == 0) {
  //   document.getElementById("add_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  //   return;
  // }

  // $("#event_name").val('');
  // $("#event_description").val('');
  // $("#event_date").val('');
  // $("#event_poster").val('');

  // document.getElementById("add_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

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
      li.html('<div class="col s12 m12 post_area "><div class=" grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="image/4.jpg" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">'+objResult.post[i].event_name +' '+ objResult.post[i].event_time+' '+ objResult.post[i].description+'<div class=""> Posted on: '+ objResult.post[i].post_time+' </br> By: '+ objResult.post[i].posted_by+' .</div> </span><span class="styleComments"> <a><p class="post_likes right"><i id="likeIcon'+objResult.post[i].post_id+'"class="fa fa-thumbs-o-up" onclick="addLikes(this)"></i></br><span id="userlikes'+objResult.post[i].post_id+'">'+objResult.post[i].post_likes+'</span></p></a><a><p id="view_comments"class="bold" onclick="toggleDiv(this)">Comments<i class="fa fa-commenting-o"></i></p></a></span><div class="col s12 commentDiv" id=""><ol id="comment_area'+objResult.post[i].post_id+'"></ol></div><div id="commenting_area" class=""><div class="input-field col s12 m10"><input id="comment'+objResult.post[i].post_id+'" type="text" class="validate" autocomplete="off"><label for="comment">Comment</label></div><div class="col s12 m12 save_post_area "><button id="post_comment_btn'+objResult.post[i].post_id+'" onclick="addComment(this)" type="submit" class="btn waves-effect wave-dark add_comment_btn blue right">Post</button></div></div> </div></div> </div></div>');

      $("#post_area_li").append(li);

      var newId=objResult.post[i].post_id;

      if(document.getElementById('post_comment_btn'+newId)){
        var getClicked=document.getElementById('post_comment_btn'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('view_comments')){
        var getClicked=document.getElementById('view_comments');

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('likeIcon'+newId)){
        var getClicked=document.getElementById('likeIcon'+newId);

        getClicked.setAttribute('id',newId);

      }
    }
  }
}

function getMyPosts(){
  var strUrl = myurl+"cmd=8";
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);

   if(objResult.result == 0){
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    for(i=1;i<objResult.post.length;i++){


      var li = $('<li></li>');
      li.html('<div class="col s12 m12 post_area "><div class=" grey lighten-5 z-depth-1"><div class="row valign-wrapper"><div class="col s2"><img src="image/4.jpg" alt="" class="circle responsive-img"></div><div class="col s10"><span class="black-text">'+objResult.post[i].event_name +' '+ objResult.post[i].event_time+' '+ objResult.post[i].description+'<div class=""> Posted on: '+ objResult.post[i].post_time+' </br> By: '+ objResult.post[i].posted_by+' .</div> </span><div class="col s12 edit_delete_post_area "><button id="editPost'+objResult.post[i].post_id+'" onclick="editMyPost(this)" type="submit" class="btn waves-effect wave-dark add_post_btn green "><i class="fa fa-edit"></i> EDIT</button><button id="deletePost'+objResult.post[i].post_id+'" onclick="deleteMyPost(this)" type="submit" class="btn waves-effect wave-dark add_post_btn red right"><i class="fa fa-remove"></i> DELETE</button></div>');
      $("#my_post_area_li").append(li);

      var newId=objResult.post[i].post_id;

      if(document.getElementById('editPost'+newId)){
        var getClicked=document.getElementById('editPost'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('deletePost'+newId)){
        var getClicked=document.getElementById('deletePost'+newId);

        getClicked.setAttribute('id',newId);
      }
      if(document.getElementById('editPostbtn')){
        var getClicked=document.getElementById('editPostbtn');

        getClicked.setAttribute('id',newId);
      }
    }
  }
}
function deleteMyPost(newid){
 var id= newid.getAttribute('id');
 var strUrl = myurl+"cmd=7&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();
}
function editMyPost(newid){
 var id= newid.getAttribute('id');
 var strUrl = myurl+"cmd=13&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  } 
  hide("addPostDiv");
  showDiv("editPost");
  $("#event_name").val(objResult.post[1].event_name);
  $("#event_date").val(objResult.post[1].event_time);
  $("#event_description").val(objResult.post[1].description);
  $("#event_poster").val(objResult.post[1].poster); 
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

}

function addEditedPost(newid){
 var id= newid.getAttribute('id');
 var name = $("#event_name").val();
 var description = $("#event_description").val();
 var e_date = $("#event_date").val();
 var e_poster = $("#event_poster").val();
 // alert("new id is "+id);

 if(name.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';

  return;
}
if(description.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
  return;
}
if(e_date.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Date<i class="material-icons">close</i></div>';
  return;
}
if(e_poster.length == 0){
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Poster<i class="material-icons">close</i></div>';
  return
}

var strUrl = myurl+"cmd=6&name="+name+"&description="+description+"&date="+e_date+"&poster="+e_poster+"&id="+id;
// prompt("url",strUrl);
var objResult = sendRequest(strUrl);
document.getElementById("my_view_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
if(objResult.result == 0) {
  document.getElementById("my_view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  return;
}

$("#event_name").val('');
$("#event_description").val('');
$("#event_date").val('');
$("#event_poster").val('');

document.getElementById("my_view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

// location.reload();
}
function addComment(newid){
  var id= newid.getAttribute('id');
  var comment = $("#comment"+id).val();

  if(comment.length == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">Empty Event Description<i class="material-icons">close</i></div>';
    return;
  }

  var strUrl = myurl+"cmd=9&description="+comment+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  document.getElementById("view_post_error").innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
  if(objResult.result == 0) {
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  $("#comment"+id).val('');
  document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

}

function getPostComments(id){
  alert("getting comments");
  // var id= newid.getAttribute('id');
  var strUrl = myurl+"cmd=10&id="+id;
   // prompt("url", strUrl);
   var objResult = sendRequest(strUrl);
   $("#comment_area").text("");
   $("#comment_area"+id).innerHTML="";
   if(objResult.result == 0){
    document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';

    return;
  }
  if(objResult.result == 1){  
    $('ul').empty();
    for(i=1;i<objResult.comment.length;i++){

      var li = $('<li></li>');
      li.html('<div id="commentSpacing"><p id="myP">'+objResult.comment[i].comment_detail+'    '+objResult.comment[i].comment_date+'     <i> '+objResult.comment[i].commented_by+'<i></p></div>');

      $("#comment_area"+id).append(li);

      
    }
  }
}

function addLikes(newid){

 var id= newid.getAttribute('id'); 
 var likes =  document.getElementById("userlikes"+id).innerText;

 var newlikes= parseInt(likes)+1;
 var strUrl = myurl+"cmd=11&likes="+newlikes+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("view_post_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("view_post_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();
  // $("#userlikes").innerHTML=newlikes;
}

function getAllUsers(){
  var strUrl = myurl+"cmd=14";
  // prompt("url", strUrl);
  var objResult = sendRequest(strUrl);

  if(objResult.result == 0){
    alert(objResult.message);
    return;
  }
  var mytable=document.getElementById("users_table");
  for(i=1;i<objResult.user.length;i++){
   var myrow=mytable.rows.length;
   var row=mytable.insertRow(myrow);
   cnt=row.insertCell(0)
   username=row.insertCell(1)
   phone=row.insertCell(2);
   year=row.insertCell(3);
   type=row.insertCell(4);
   edit=row.insertCell(5);

   cnt.innerHTML=i;
   username.innerHTML=objResult.user[i].user_name;
   phone.innerHTML=objResult.user[i].user_phone;
   year.innerHTML=objResult.user[i].year_group;
   var userTypeOption = document.createElement("select");
   userTypeOption.setAttribute('class','input-field');
   userTypeOption.setAttribute('value', objResult.user[i].user_type);
   // objResult.user[i].user_type
   type.innerHTML='<div class="input-field col s12 m8"><input id="userType'+objResult.user[i].user_id+'" type="text" class="validate" autocomplete="off"></div>'; 
   edit.innerHTML='</div><button id="myBtn'+objResult.user[i].user_id+'" onclick="change_user_type(this)" class="btn waves-effect waves-light green center-align" type="submit" name="action"><i class="fa fa-save"></i>SAVE</button></div>';      
   
   $("#userType"+objResult.user[i].user_id).val(objResult.user[i].user_type);
   var newId=objResult.user[i].user_id;
   if(document.getElementById('myBtn'+newId)){
    var getClicked=document.getElementById('myBtn'+newId);

    getClicked.setAttribute('id',newId);
  }

}
}

function change_user_type(newid){
  var id= newid.getAttribute('id');
  // alert("saving");
  var user = $("#userType"+id).val();
 if(user.length == 0){
  document.getElementById("admin_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';

  return;
}
var strUrl = myurl+"cmd=15&user="+user+"&id="+id;
  // prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
  if(objResult.result == 0) {
    document.getElementById("admin_error").innerHTML = '<div class="chip red white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
    return;
  }

  document.getElementById("admin_error").innerHTML = '<div class="chip green white-text">'+objResult.message+'<i class="material-icons">close</i></div>';
  location.reload();

}

function sendInvite(){

  var fon = $("#user_invite").val();
 if(fon.length == 0){
  document.getElementById("send_msg_error").innerHTML = '<div class="chip red white-text">Empty Event Name<i class="material-icons">close</i></div>';

  return;
}
var strUrl = myurl+"cmd=16&phone="+fon;
  prompt("url",strUrl);
  var objResult = sendRequest(strUrl);
 
  document.getElementById("send_msg_error").innerHTML = '<div class="chip green white-text">Message sent to: '+fon+'<i class="material-icons">close</i></div>';
  $("#user_invite").val('');

}

function logout(){
 var strUrl = myurl+"cmd=3";
 // prompt("url",strUrl);
 var objResult = sendRequest(strUrl);

 if(objResult.result == 0){
  alert(objResult.message);
  return;
}
alert(objResult.message);
window.location.href = "index.html";

}

