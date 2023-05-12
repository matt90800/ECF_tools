const main = document.querySelector('main');
let previousURL;

const createCard = (element)=> {
   // console.log(element)
    const article = document.createElement('article');
    article.style.backgroundColor='lightgrey'
    article.className='card col-sm-12 col-md-6 col-lg-4';
/*         article.addEventListener("click",(e)=>{
            main.innerHTML = '';   
            const url = "";
            fetch (url)
            .then(response => response.json())
            .then(json => {
                main.append(createCard(json)) 
        });
        }) */

    article.innerHTML=`
            <img src=${element.visual!=null?element.visual:"placeholder-image.png"} class="card-img-top img-fluid" alt="Image not found">
            <div class="card-body">
                <h4 class="card-title">${element.name}</h4>
                <p class="card-text">${element.description}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">${element.points}</li>
                <li class="list-group-item">${element.categoryName}</li>
                <li class="list-group-item"></li>
            </ul>`
    const div=document.createElement("div");
    div.className="card-body d-flex space-content-between"
    /*   <div class="card-body"> */
    article.append(div);

    const update = document.createElement("form");
    update.innerHTML=`<input type="hidden" name="object" value="${element.id}">
    <input type="hidden" name="action" value="update">
    <button class="btn btn-primary" type="submit">Update</button>`;
    const deletion = document.createElement("form");
    deletion.innerHTML=`<input type="hidden" name="object" value="${element.id}">
    <input type="hidden" name="action" value="delete">
    <button class="btn btn-primary" type="submit">Delete</button>`;

    div.append(update);
    div.append(deletion);

        return article;
}


const fetchData = () => {
        const url = "http://localhost/Ecf_tools/src/index.php?api=tool&id=<?=$id?>";
        fetch (url)
            .then(response => response.json())
            .then(json => {
                json=json.response
               // console.error(json)
                if (json.length>0) {
                    main.innerHTML='';
                    json.forEach(element => {
                        main.append(createCard(element))
                    })
                } /*else if(json.length==1){
                    main.innerHTML='';
                    console.log(json);
                    main.append(createCard(json[]))
                } */
        })
}

    fetchData();

//document.querySelectorAll("article")