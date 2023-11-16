

// Read Messages from the DataBase 

let msgdiv=document.querySelector(".msg");
setInterval(() => {
  fetch("readMsg.php").then(
    r=>{
     if(r.ok){
      return r.text();
     }
    }
  ).then(
    d=>{
      msgdiv.innerHTML=d;
    }
  )
}, 500);

document.addEventListener("DOMContentLoaded", function() {
  const changeThemeBtn = document.getElementById("changeThemeBtn");
  const backgroundLeft = document.querySelector(".background-left");
  const body = document.body;
  const chat = document.querySelector(".chat");
  const h1 = document.querySelector("h1");
  const h2 = document.querySelector(".chat h2");

  let isDarkTheme = false;

  changeThemeBtn.addEventListener("click", function() {
    if (isDarkTheme) {
      // Revert to the original theme
      backgroundLeft.style.backgroundImage = "url('https://i.pinimg.com/originals/7c/1d/ab/7c1dab157f34e603487b5d0b057da448.gif')";
      body.style.backgroundImage = "url('https://wallpapers.com/images/hd/whatsapp-purple-leaves-xddf2pzof9ml3bgu.jpg')";
      chat.style.backgroundColor = "#8585ba";
      h1.style.backgroundColor = "#323250";
      h2.style.backgroundColor = "#323250";
    } else {
      // Change to the new theme
      backgroundLeft.style.backgroundImage = "url('https://cdn.dribbble.com/users/1894420/screenshots/14081986/media/790c0983a729e5ce15f4d25f42697e77.gif')";
      body.style.backgroundImage = "url('https://png.pngtree.com/background/20210715/original/pngtree-valentines-day-red-hearts-background-picture-image_1293296.jpg')";
      chat.style.backgroundColor = "white";
      h1.style.backgroundColor = "darkred";
      h2.style.backgroundColor = "darkred";
    }

    // Toggle the theme state
    isDarkTheme = !isDarkTheme;
  });
});





// ADD Messages to the DataBase 
window.onkeydown=(e)=>{
  if(e.key=="Enter"){
    update()
  }
}
function update(){
  let msg=input_msg.value;
  input_msg.value="";
  fetch(`addMsg.php?msg=${msg}`).then(
    r=>{
      if(r.ok){
        return r.text();
      }
    }
  ).then(
    d=>{
      console.log("msg has been added")
      msgdiv.scrollTop=(msgdiv.scrollHeight-msgdiv.clientHeight);
    }
  )
}