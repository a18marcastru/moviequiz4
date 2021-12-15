document.getElementById("botonLogin").addEventListener('click', function(){
    let email = document.getElementById("correo").value;
    let pass = document.getElementById("contrasena").value;

    console.log(email);
    console.log(pass);

    let datosEnvio = new FormData();
    datosEnvio.append('correo',email);
    datosEnvio.append('contrasena',pass);

    document.getElementById("botonLogin").setAttribute("style","display: none;");
    document.getElementById("loading").removeAttribute("hidden");

    fetch('http://localhost:63342/moviequiz-grup-4/back/mvc/login.php',{
        method: 'POST',
        body: datosEnvio
    }).then(function(res){
        return res.json();
    }).then(function(data) {
            console.log(data);
            if (data.exito == true) {
                document.getElementById("login").classList.remove("activa");
                document.getElementById("login").classList.add("noactiva");
                document.getElementById("info-usuari").classList.add("activa");
                document.getElementById("info-usuari").classList.remove("noactiva");
                $log = true;
                htmlstr = "";
                htmlstr += `<h5>Bienvenido de nuevo ${data.nombre} ${data.apellido}</h5>`;
                document.getElementById("inicio").innerHTML = htmlstr;
            } else {
                document.getElementById("botonLogin").removeAttribute("style", "display: none;");
                document.getElementById("loading").setAttribute("style", "display: none;");
                htmlstr = "";
                htmlstr += `<h5>Escribe esto tonto ${data.correo} ${data.contrasena}</h5>`;
                document.getElementById("inicio").innerHTML = htmlstr;
            }
    }).catch(function(){
        console.log("Problema!");
    });
});
document.getElementById("peliculas").addEventListener("click", function (e) {
  /*  if (e.target.classList == "material-icons") {
        id = e.target.parentElement.href.split("#")[1];
        num = id.split("e")[1];
        
        if (document.getElementById("info-usuari").classList != "noactiva") {
            document.getElementById("btn-guardar").classList.remove("disabled");
            document.getElementById("divError").classList.add("oculto");
            document.getElementById("resultat").classList.remove("oculto");
        }
        
        document.getElementById("formValue").addEventListener("click", function (e) {
            valoracion = e.target.parentElement.querySelector("[name='valoracion']").value;
            console.log()
        });
        
        document.getElementById("btn-guardar").addEventListener("click", function (e) {
            //let favorito = (e.target.parentElement.querySelector("[name='fav']").value == "on") ? true : false;
            let comentario = e.target.parentElement.querySelector("#comentario").value;
            console.log(valoracion + " " + favorito + " " + comentario);
        });
    } */
    if (document.getElementById("info-usuari").classList != "noactiva") {
        //document.getElementById("btn-guardar").classList.remove("disabled");
        //document.getElementById("divError").classList.add("oculto");
        //document.getElementById("resultat").classList.remove("oculto");

        document.getElementById("resultados").addEventListener("click", function(e) {
            console.log(e.target);
            if (e.target.classList.contains("add")) {
                console.log("Añado la pelicula" + e.target.parentNode.id);
                const datosPeli = datos.Search[e.target.parentNode.id];
                e.target.classList.add("added");
                e.target.innerHTML = "OK!"

                const datosEnvio = new FormData();
                datosEnvio.append('imdbId', datosPeli.imdbID);
                datosEnvio.append('nombre', datosPeli.Title);
                datosEnvio.append('poster', datosPeli.Poster);
                datosEnvio.append('anyo', datosPeli.Year);
                fetch('http://localhost:63342/moviequiz-grup-4/back/mvc/peliculas.php', {
                    method: 'POST',
                    body: datosEnvio
                }).then(function(res){
                    return res.json();
                }).then(function(data) {
                    console.log(data);
                    }
            )}
        });
    }
});


document.getElementById("enviar").addEventListener("click", function() {
    let nombre= document.getElementById("search").value;
    fetch(`http://www.omdbapi.com/?i=tt3896198&apikey=7879d824&s=${nombre}`).then(function(res) {
        return res.json();
    }).then(function(data) {
        console.log(data);
        let pelis = "";
        for(i = 0; i < 10; i++){
            datos = data.Search[i];
            pelis += `<div class="col s6 m4 l3">
                        <div class="card">
                            <div class="card-image">
                                <img src="${datos.Poster}" class="style_img" height="400px">
                                <a id="btn-modal" class="btn-floating halfway-fab modal-trigger waves-effect waves-light red" href="#modal${i}"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <span>${datos.Title}</span><br>
                                <span>${datos.Year}</span>
                            </div>
                        </div>
                        <div id="modal${i}" class="modal">
                            <div class="modal-content">
                                <h4 class="center-align cyan-text text-darken-3">${datos.Title} (${datos.Year})</h4>
                                </br>
                                <div>
                                    <label>
                                        <input type="checkbox" id="fav" name="fav"/>
                                        <span>Marcar como favorito</span>
                                    </label>
                                </div>
                                <div id="formValue">
                                    </br>
                                    <h5 class="red-text darken-1">Valoración</h5>
                                    </br>
                                    <label>
                                        <input name="valoracion" type="radio" value="1"/>
                                        <span>1</span>
                                    </label>
                                    <label>
                                        <input name="valoracion" type="radio" value="2"/>
                                        <span>2</span>
                                    </label>
                                    <label>
                                        <input name="valoracion" type="radio" value="3"/>
                                        <span>3</span>
                                    </label>
                                    <label>
                                        <input name="valoracion" type="radio" value="4"/>
                                        <span>4</span>
                                    </label>
                                    <label>
                                        <input name="valoracion" type="radio" value="5"/>
                                        <span>5</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <textarea id="comentario" class="materialize-textarea" data-length="200"></textarea>
                                    <label for="comentario">Comentario</label>
                                </div>
                                <button id="btn-guardar" class="btn waves-effect waves-light"> Guardar </button>
                                <!--<div id="divError" class="divError"><label class="error"><span style="font-size: 20px"> ! </span>Debes de iniciar sesión para poder hacer una valoración</label></div>-->
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="btn modal-close red"><i class="material-icons">close</i></a>
                            </div>
                        </div>
                    </div>`;
        }
        document.getElementById("peliculas").innerHTML = pelis;
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems,{});
    }).catch(function() {
        console.log("problema!");
    });
});