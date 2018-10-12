/**
 * Copyright (C) Covalense Technologies - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nair, 5/10/18 8:12 PM
 */

function delete_record($this) {
    var request_data = $this.id;
    swal({
        title: "Are you sure?",
        text: "Once deleted, you can not recover your challenge!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: "delete?cid=" + request_data,
                    success: function (data) {
                        if (data == "true") {
                            swal("Poof! Your Challenge has been deleted !", {
                                icon: "success",
                            });
                            location.reload();
                        } else if (data == "false") {
                            swal("Poof! Your file WAS NOT  deleted !", {
                                icon: "success",
                            });
                        }
                    }

                })
            } else {
                swal("Your  Challenge is safe!");
            }
        });
}
