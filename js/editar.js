$("form").on("submit",(event)=>{
    event.preventDefault();
    let data = $("form").serialize();
    $.ajax({
        url:"/editar",
        type:"post",
        data:data,
        success: ()=>{
            $("html, body").animate({ scrollTop: 0 }, 600, );
            let alertBox = $("<div></div>").text("Post atualizado com sucesso!").addClass("alert success-alert")
            $("info").append(alertBox).hide().delay(500).fadeIn(200);
            $("info div").delay(2400).fadeOut(500,()=>{
                $("info div").remove();
            });
        },
        error: ()=>{
            $("html, body").animate({ scrollTop: 0 }, 600);
            let alertBox = $("<div></div>").text("Não foi possível atualizar o post!").addClass("alert danger-alert")
            $("info").append(alertBox).hide().delay(500).fadeIn(200);
            $("info div").delay(2400).fadeOut(500,()=>{
                $("info div").remove();
            });
        }
    })
})