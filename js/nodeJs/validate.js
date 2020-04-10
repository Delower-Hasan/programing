const {body}= require('express-validator')

module.exports =[

    body('userName')
    .not()
    .isEmpty()
    .withMessage('userName cant be Empty')
    .trim(),
    

    body('email')
    .not()
    .isEmpty().withMessage('Email Cant be empty')
    .normalizeEmail(),
 
    body('password')
    .not().isEmpty().withMessage('password Cant be Empty')
    .trim(),

    body('conPassword')
    .custom((pass,{req})=>{
        if(pass != req.body.password){
            throw new Error('Password Does not match')
        }
        return true
    })


]