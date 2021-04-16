$('form').on('submit',(event)=>{
    event.preventDefault();
    let data = $('form').serialize();
    $.ajax({
        url:"/login",
        type:"post",
        data:data,
        success: (data)=>{
            console.log(data);
            $("html, body").animate({ scrollTop: 0 }, 600, );
            let alertBox = $("<div></div>").text("Post atualizado com sucesso!").addClass('alert success-alert')
            $('info').append(alertBox).hide().delay(500).fadeIn(200);
            $('info div').delay(2400).fadeOut(500)
        },
        error: ()=>{
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Credênciais incorretas!").addClass('alert danger-alert')
            $('info').append(alertBox).hide().delay(100).fadeIn(200);
            $('info div').delay(2000).fadeOut(500,()=>{
                $('info div').remove();
            })
        }
    })
})