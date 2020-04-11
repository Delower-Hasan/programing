// let user = require('../Models/User')

// exports.bindUserWithRequest = () => {
//     return async(req, res, next) => {
//         if (!req.session.isLoggedIn) {
//             next()
//         }
//         try {
//             let user = await User.findById(req.session.user._id)
//             req.user = user
//             next()
//         } catch (error) {
//             console.log(error)
//             next(error)
//         }
//     }
// }