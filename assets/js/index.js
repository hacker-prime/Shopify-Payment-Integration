    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function hideSideNav(){
        document.getElementById("mySidenav").style.width = "0";

    }

    // https://www.w3schools.com/howto/howto_js_active_element.asp 
    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_active_element
    // https://www.w3schools.com/jsref/prop_html_classname.asp
    // Add active class to the current button (highlight it)
    var header = document.getElementById("menu-wrapper");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace("active","");
    this.className += " active";
    });
    }                             
  
    // https://www.w3schools.com/howto/howto_js_toggle_class.asp  
    // https://jsfiddle.net/uu152uu9/  
    // https://www.youtube.com/watch?v=FKQkx-wGexo 
    // function changeActiveClass(){
    //         mainMenu.classList.toggle('active');    
    // }   

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    // https://codepen.io/sitanotern1337/pen/MPVbeL
    //I had to modify the code a bit. It's similar to the code shown in this video
    //https://www.youtube.com/watch?v=V9CY0F4Wc7M (The "scroll" event in JavaScript | window.onscroll)
    const newNav = () => {
        let navigation = document.querySelector('.nav');
        window.addEventListener('scroll', () => {
          if(document.body.scrollTop > 100 ||document.documentElement.scrollTop > 100 ) {
            navigation.classList.add('hide');
          } else {
            navigation.classList.remove('hide');
          }
        });
      
      }
      
      newNav();


  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    //   https://stackoverflow.com/questions/1144805/scroll-to-the-top-of-the-page-using-javascript?noredirect=1&lq=1
    // Get The Id
    var topPage = document.getElementById(`top-page`)

    // On Click, Scroll to the Top of Page
    // topPage.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' 
    
    
    //  })

    // On scroll, Show/Hide the button
    window.onscroll = () => {
    window.scrollY > 300
        ? (topPage.style.display = `block`)
        : (topPage.style.display = `none`)
          
                    
    }
    
  

    function topPageScroll(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace("active","");
      
      // https://www.w3schools.com/howto/howto_js_add_class.asp
      var element = document.getElementById("myDIV");
      element.classList.add("active");
      
      // https://stackoverflow.com/questions/5898656/check-if-an-element-contains-a-class-in-javascript
      // https://codetogo.io/how-to-check-if-element-has-class-in-javascript/
      // var menu = document.getElementsByClassName("active");
      // menu[0].className = menu[0].className.replace("active","");


      // const div = document.querySelector('div');
      // if(div.classList.contains('active')){
      // var menu = document.getElementsByClassName("active");
      // menu[0].className = menu[0].className.replace("active","");

      // }else{
      //   var home = document.getElementsByClassName("home");
      //   home.className += " active";

      // }
  
      // const div = document.querySelector('a');
      // if(div.classList.contains('btn')){
      // var home = document.getElementsByClassName("home");
      // home.className += " active";
      // }else{
      //   alert("error")
      // }
  

    }

    var topPageMenuRemove = document.getElementById(`top-page`)
    topPageMenuRemove.onclick = () => {
      topPageScroll();
      window.scrollTo({ top: 0, behavior: 'smooth'        
                  })
    }
     
    