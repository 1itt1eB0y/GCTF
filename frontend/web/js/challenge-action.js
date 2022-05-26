$(function () {
    CheckAddress();
})

function CheckAddress() {
    console.log("CheckAddress");
    var url = '/container/address?challenge_id=' + $('#flag').attr('challenge');
    jQuery.get(url, checkCallback).fail;
}

function checkCallback(data) {
    createBtn = document.getElementById('create');
    if (data['free']) {
        console.log("Container is free");
        createBtn.innerHTML = 'Create Container';
    } else {
        createBtn.click();
    }
}

function CreateContainer(challenge_id, create = true) {
    document.getElementById('create').innerHTML = 'Checking...';
    console.log("CreateContainer");
    $.ajax({
        url: '/container/address?challenge_id=' + challenge_id + '&create=' + create,
        type: 'GET',
        success: function (data) {
            createCallback(data);
        },
        fail: function (data){
            console.log("Fail");
            createCallback(data);
        }
    });
}

function createCallback(data) {
    message = data.message;
    console.log(data);
    var btn_status = '';
    createBtn = document.getElementById('create');
    if (data.state == 'success') {
        btn_status = 'success';
        createBtn.setAttribute('href', message);
        createBtn.removeAttribute('onclick');
    } else if (data.state == 'error') {
        btn_status = 'danger';
    } else if (data.state == 'warning') {
        btn_status = 'warning';
    }
    // console.log('btnstyle: ' + btn_status);
    createBtn.className = 'btn btn-' + btn_status;
    createBtn.innerHTML = message;
}

function DeleteContainer(challenge_id) {
    document.getElementById('delete').innerHTML = 'Deleting...';
    console.log("DeleteContainer");
    $.ajax({
        url: '/container/delete',
        type: 'DELETE',
        success: function (data) {
            deleteCallback(data, challenge_id);
        }
    });
}

function deleteCallback(data, challenge_id) {
    console.log(data);
    if (data.state == 'success') {
        createBtn = document.getElementById('create');
        createBtn.className = 'btn btn-success';
        createBtn.innerHTML = 'Create Container';
        createBtn.setAttribute('onclick', 'CreateContainer(' + challenge_id + ')');
        createBtn.removeAttribute('href');
        document.getElementById('delete').innerHTML = 'Delete Container';
    } else {
        document.getElementById('delete').innerHTML = data.message;
    }
}

function DownloadFile(hash) {
    console.log("DownloadFile");
    var url = '/file/download/' + hash;
    jQuery.redirect(url);
}