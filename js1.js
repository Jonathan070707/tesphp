window.addEventListener('load', function() {
    var element = document.getElementById('fadeintext');
    element.classList.add('loaded');
});


  function experiencedetail1() {
    var box = document.getElementById('detail1');
    var button = document.getElementById('toggleButton1');
    if (box.style.display === 'none' || box.style.display === '') {
        box.style.display = 'block'; 
        button.classList.remove('button-red'); 
        button.classList.add('button-redstay');
    } else {
        box.style.display = 'none';
        button.classList.remove('button-redstay');
        button.classList.add('button-red');
    }
}

function experiencedetail2() {
    var box = document.getElementById('detail2');
    var button = document.getElementById('toggleButton2');
    if (box.style.display === 'none' || box.style.display === '') {
        box.style.display = 'block'; 
        button.classList.remove('button-red'); 
        button.classList.add('button-redstay');
    } else {
        box.style.display = 'none';
        button.classList.remove('button-redstay');
        button.classList.add('button-red');
    }
}



const articletitle = ["Memahami Kecerdasan Buatan (AI)", "Dungeon Meshi", "Pemrograman Web: Menggali Dunia Digital"]; //judul2artikel

function decidingtitle() {
    const pageTitle = document.title;
    const theTitle = document.getElementById("theTitle");

    let index;
    switch (pageTitle) {
        case "AI - Artikel 0":
            index = 0;
            break;
        case "DnD - Artikel 1":
            index = 1;
            break;
        case "Web - Artikel 2":
            index = 2;
            break;
        default:
            index = 0; 
    }

    theTitle.textContent = articletitle[index];
    
}

document.addEventListener("DOMContentLoaded", decidingtitle);

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('aititle').textContent = articletitle[0];
    document.getElementById('dndtitle').textContent = articletitle[1];
    document.getElementById('webtitle').textContent = articletitle[2];
});

const navLinks = [
    { text: 'Home', url: 'https://jonathan070707.github.io/TIK-2032JS/' },
    { text: 'Gallery', url: 'https://jonathan070707.github.io/TIK-2032JS/index2gal.html' },
    { text: 'Blog', url: 'https://jonathan070707.github.io/TIK-2032JS/index3.1blog.html' },
    { text: 'Contact', url: 'https://jonathan070707.github.io/TIK-2032JS/index4contact.html' }
  ];
  
  const navigationBar = document.getElementById('navigation_bar');

  navLinks.forEach(link => {
    const listItem = document.createElement('li');
    const anchor = document.createElement('a');
    anchor.textContent = link.text;
    anchor.href = link.url;
    listItem.appendChild(anchor);
    navigationBar.appendChild(listItem);
  });
  
  document.getElementById("footer").innerHTML = "Project TIK-2032";

  function loadpp() {
    var xhr = new XMLHttpRequest();
    var url = "https://api.github.com/users/therealJonathan01";

    xhr.onerror = function () {
        alert("Gagal mengambil data");
    };



    xhr.onloadend = function () {
        if (this.responseText !== "") {
            var data = JSON.parse(this.responseText);
            var img = document.createElement("img");
            img.src = data.avatar_url;
            var name = document.createElement("h3");
            name.innerHTML = data.name;

            document.getElementById("hasil").append(img, name);
            document.getElementById("buttonforpp").style.display = "none";
        }

        setTimeout(function () {
            document.getElementById("buttonforpp").onclick.innerHTML = "Load Content";
        }, 3000);
    };

    xhr.open("GET", url, true);
    xhr.send();
}

function clearResult() {
    document.getElementById("hasil").innerHTML = ""; 
    document.getElementById("buttonforpp").style.display = "block";
    document.getElementById("buttonforpp").style.margin = "0 auto";
}

window.onload = function() {
    document.getElementById("buttonforpp").onclick = function() {
        var firstConfirmation = confirm("See my photo profile?");
        if (firstConfirmation) {
            var secondConfirmation = confirm("Sure?");
            if (secondConfirmation) {
                loadpp();
            }
        }
    };
};