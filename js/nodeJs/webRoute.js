const authRouter = require('./auth/authRoutes')
const dashboard = require('./dashbordRoutes')

const routes = [
    {
        path:'/auth',
        handler:authRouter
    },
    {
        path:'/dashboard',
        handler:dashboard
    },
    {
        path:'/',
        handler:(req, res) => {
            res.json({
                message: 'Hello This is just Start'
            })
        }
    },
]

module.exports = app=>{
    routes.forEach(route=>{
      if(route.path=='/'){
        app.get(route.path,route.handler)
      }else{
        app.use(route.path,route.handler)
      }
    })
}