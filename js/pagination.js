$(document).ready(()=>{
    getPosts();
});

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

            if(numberPages!=dados.pages){
                // $('ul').remove();
                for(let i= 1; i<=dados.pages; i++){
                    $('ul').append(`
                    <li class="page-item${i==page && '-activate'}">
                        <button class="page-number" value=${i}>${i}</button>
                    </li>`);
                }
            }
            
            $('tr').remove();
            dados.data.map(post=>{
                // console.log(post);
                $('tbody').append(`
                <tr id=${post.id}>
                    <td>${post.title}</td>
                    <td>${post.difficulty}</td>
                    <td>${post.create_date}</td>
                </tr>
            `)
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