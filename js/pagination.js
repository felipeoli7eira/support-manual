getPosts();

function getActualPage(){
    var queryParams = new URLSearchParams(window.location.search);
    // queryParams.set("page", "x");
     return queryParams.get('page');
    // history.replaceState(null, null, "?"+queryParams.toString());
}

function setActualPage(page){
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?"+queryParams.toString());
}

function getPosts(page = getActualPage() || 1){

    $.ajax({
        url:`/getPostagens?page=${page}`,
        type:"get",
        success: (json)=>{
            const dados = JSON.parse(json);

            const numberPages= $('li').length;
            // const numberPages= 7;

            
            $('#pag-buttons').html('');
            console.log(dados.pages);
            for(let i= 1; i<=dados.pages; i++){
                let className = (i == page) ? 'page-item-activate' : 'page-item';

                let li = $("<li></li>").addClass(className);

                li.append(`<button class="page-number" value=${i}>${i}</button>`);

                li.on('click',(e)=>{
                    setActualPage(e.target.value);
                    getPosts(e.target.value);
                });

                $('ul').append(li);
            }
            
            
            $('tr').remove();
            dados.data.map(post=>{
                let tr = $("<tr></tr>").attr('id',`${post.id}`);

                tr.append(`<td>${post.title}</td>`);
                tr.append(`<td>${post.difficulty}</td>`);
                tr.append(`<td>${post.create_date}</td>`);

                tr.on('click',(e)=>{
                    console.log("A");
                });

                $('tbody').append(tr);
            });

            
        },
        error: ()=>{
            console.log('ERROR');
        }
    });
}

$('.page-number').on('click',(e)=>{
    setActualPage(e.target.value);
    getPosts(e.target.value);
});

$('tr').on('click',(e)=>{
    // console.log('OIII');
    console.log($(this).data('id'));
    // getPosts(e.target.value);
});