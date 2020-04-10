const multer = require('multer');
const path = require('path')


const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'public/uploads')

    },
    filename: (req, file, cb) => {
        cb(null, file.fieldname + '-' + Date.now() + '-' + file.originalname)
    }
})

const upload = multer({
    storage,
    limits: {
        fileSize: 1024 * 102485,
    },
    fileFilter: (req, file, cb) => {
        const types = /jpeg|jpg|png|gif/;
        const extension = types.test(path.extname(file.originalname).toLocaleLowerCase());
        const mimType = types.test(file.mimetype);

        if (extension && mimType) {
            cb(null, true)
        } else {
            cb(new Error('It supports only img'))
        }

    }


})

module.exports = upload

<!-- route Call -->
router.post('/signUp',upload.single('userImage'), signUpValidate,createUser)