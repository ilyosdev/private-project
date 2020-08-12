// Made by Nodirbek Sharipov. https://nodir.dev

// ==========================================
// =	INTERACT WITH REST API HERE!!!		=
// ==========================================
const CREATE_CHAPTER = (title, cb) => {
    // following structure need to be passed to cb:
    // cb({err:bool, id:int, title:str})
    loading.show();


    // send create request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error creating this shit, ){
    // 	cb({err:true}); // means we got error
    // }else{
    // 	cb({err:false, id:int, title:str}); // successfully created
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb({err: false, id: Math.floor(Math.random() * 100000000), title: title})
    }, 1000)
}

const EDIT_CHAPTER = (id, title, cb) => {
    // following structure need to be passed to cb:
    // cb({err:bool, title:str})
    loading.show();


    // send update request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error updating this shit, ){
    // 	cb({err:true}); // means we got error
    // }else{
    // 	cb({err:false, title:str}); // successfully updated
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb({err: false, title: title})
    }, 1000)

}

const DELETE_CHAPTER = (ID, cb) => {
    loading.show();

    // send delete request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error deleting this shit, ){
    // 	cb(true); // means we got error
    // }else{
    // 	cb(false); // successfully deleted
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb(false);
    }, 1000)
}

const CREATE_LESSON = (title, cb) => {
    // following structure need to be passed to cb:
    // cb({err:bool, id:int, title:str})
    loading.show();


    // send create request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error creating this shit, ){
    // 	cb({err:true}); // means we got error
    // }else{
    // 	cb({err:false, id:int, title:str}); // successfully created
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb({err: false, id: Math.floor(Math.random() * 100000000), title: title})
    }, 1000)

}

const EDIT_LESSON = (id, title, cb) => {
    // following structure need to be passed to cb:
    // cb({err:bool, title:str})
    loading.show();


    // send update request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error updating this shit, ){
    // 	cb({err:true}); // means we got error
    // }else{
    // 	cb({err:false, title:str}); // successfully updated
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb({err: false, title: title})
    }, 1000)
}

const DELETE_LESSON = (ID, cb) => {
    loading.show();

    // send delete request to REST API service
    // once we got response from server
    // loading.hide();
    // if(you have error deleting this shit, ){
    // 	cb(true); // means we got error
    // }else{
    // 	cb(false); // successfully deleted
    // }


    // comment out following code, it is only written to simulate request-response time
    setTimeout(() => {
        loading.hide();
        cb(false);
    }, 1000)
}

