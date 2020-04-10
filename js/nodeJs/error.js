app.use((req,res,next)=>{
    let error = new Error('404 page not Fountd')
    error.status = 404
    next(error)
})

app.use((error,req,res,next)=>{
    console.log(error)
    if(error.status== 404){
        res.render('error/404',{flashMessage:{}})
    }else{
        res.render('error/500',{flashMessage:{}})
    }
})
