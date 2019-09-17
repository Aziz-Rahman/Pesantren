
$().ready(function() {
    // validate the comment form when it is submitted
    $("#feedback_form").validate();

    // info: don't use (-), use underscore(_)

    // validate to register santri
    $("#register-santri").validate({
        rules: {
            full_name: {
                required: true,
            },
            brithday: {
                required: true,
            },
            city_brithday: {
                required: true,
            },
            jekel: {
                required: true,
            },
            status_kawin: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                number: true,
            },
            photo: {
                required: true,
            },
            ktp: {
                required: true,
            },
            city: {
                required: true,
            },
            cd_pos: {
                required: true,
                number: true,
            },
            address: {
                required: true,
            },
            father: {
                required: true,
            },
            mother: {
                required: true,
            },
            username: {
                required: true,
                minlength: 6,
            },
            password: {
                required: true,
                minlength: 8,
            },
        },
        messages: {                
            full_name: {
                required: "Nama lengkap harus diisi.",
            },
            brithday: {
                required: "Tanggal harus diisi.",
            },
            city_brithday: {
                required: "Tempat harus diisi.",
            },
            jekel: {
                required: "Jenis kalamin harus diisi.",
            },
            status_kawin: {
                required: "Status perkawinan harus diisi.",
            },
            email: {
                required: "Email harus diisi.",
                email: "Email tidak valid.",
            },
            phone: {
                required: "No. telepon harus diisi.",
                number: "No. telepon tidak valid.",
            },
            photo: {
                required: "Foto harus diupload.",
            },
            ktp: {
                required: "KTP harus diupload.",
            },
            city: {
                required: "Nama kota tidak boleh kosong.",
            },
            cd_pos: {
                required: "Kode pos tidak boleh kosong.",
                number: "Kode pos tidak valid.",
            },
            address: {
                required: "Alamat tidak boleh kosong.",
            },
            father: {
                required: "Nama Ayah tidak boleh kosong.",
            },
            mother: {
                required: "Nama Ibu tidak boleh kosong.",
            },
            username: {
                required: "Username harus diisi.",
                minlength: "Panjang karakter minimal 6 karakter.",
            },
            password: {
                required: "Password harus diisi.",
                minlength: "Panjang karakter minimal 8 karakter.",
            },
        }
    });

    // validate to login santri
    $("#form-login-santri").validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {                
            username: {
                required: "Username tidak boleh kosong.",
            },
            password: {
                required: "Password tidak boleh kosong.",
            },
        }
    });

    // validate to order confirmation
    $("#order-confirmation").validate({
        rules: {
            no_order: {
                required: true,
            },
            dari_bank: {
                required: true,
            },
            atas_nama: {
                required: true,
            },
            bank_tujuan: {
                required: true,
            },
            total: {
                required: true,
                number: true,
            },
            bukti_transfer: {
                required: true,
            },
        },
        messages: {                
            no_order: {
                required: "No. Order harus diisi.",
            },
            dari_bank: {
                required: "Nama bank diisi.",
            },
            atas_nama: {
                required: "Atas nama harus diisi.",
            },
            bank_tujuan: {
                required: "Nama bank tujuan harus diisi.",
            },
            total: {
                required: "Total harus diisi.",
                number: "Total tidak valid.",
            },
            bukti_transfer: {
                required: "Bukti transfer/ foto harus di upload.",
            },
        }
    });


    // validate add product
    $("#product_form").validate({
        rules: {
            productname: {
                required: true,
                minlength: 3
            },
            category: {
                required: true,
                // minlength: 6
            },
            date: {
                required: true,
            },
            image1: {
                required: true,
            },
            color: {
                required: true,
            },
            stock: {
                required: true,
                number: true,
            },
            price: {
                required: true,
                number: true,
            },
        },
        messages: {                
            productname: {
                required: "Nama produk harus diisi",
                minlength: "Panjang karakter minimal 3 karakter."
            },
            category: {
                required: "Anda belum memilih kategori.",
            },
            date: {
                required: "Tanggal harus diisi.",
            },
            image1: {
                required: "Silahkan upload gambar utama.",
            },
            // color: {
            //     required: "Warna harus diisi.",
            // },
            stock: {
                required: "Jumlah stok harus diisi.",
                number: "Karakter harus angka.",
            },
            price: {
                required: "Harga produk harus diisi.",
                number: "Karakter harus angka.",
            },
        }
    });

    // Validate to edit admin
    // $("#form-editadm").validate({
    //     rules: {
    //         nameuser: {
    //             required: true,
    //         },
    //         emailuser: {
    //             required: true,
    //             email: true,
    //             // minlength: 6
    //         },
    //          telp: {
    //              required: true,
    //         },
    //         address: {
    //              required: true,
    //         },
    //         username: {
    //              required: true,
    //         },
    //         pass: {
    //              required: true,
    //         },
    //     },
    //     messages: {                
    //         nameuser: {
    //             required: "Nama harus diisi",
    //         },
    //         emailuser: {
    //             required: "Email harus diisi.",
    //              email: "Email tidak valid",
    //         },
    //         telp: {
    //             required: "No. Telepon harus diisi.",
    //         },
    //         address: {
    //             required: "Alamat harus diisi.",
    //         },
    //         username: {
    //             required: "Username harus diisi.",
    //         },
    //         pass: {
    //             required: "Password harus diisi.",
    //         },
    //     }
    // });

    // Validate to edit product
    $("#form-edit-pro").validate({
        rules: {
            product: {
                required: true,
                minlength: 3
            },
            // category: {
            //     required: true,
            //     // minlength: 6
            // },
        },
        messages: {                
            product: {
                required: "Nama produk harus diisi",
                minlength: "Panjang karakter minimal 3 karakter."
            },
            // category: {
            //     required: "Anda belum memilih kategori.",
            // },
        }
    });

    // // propose username by combining first- and lastname
    // $("#username").focus(function() {
    //     var firstname = $("#firstname").val();
    //     var lastname = $("#lastname").val();
    //     if(firstname && lastname && !this.value) {
    //         this.value = firstname + "." + lastname;
    //     }
    // });

    // //code to hide topic selection, disable for demo
    // var newsletter = $("#newsletter");
    // // newsletter topics are optional, hide at first
    // var inital = newsletter.is(":checked");
    // var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
    // var topicInputs = topics.find("input").attr("disabled", !inital);
    // // show when newsletter is checked
    // newsletter.click(function() {
    //     topics[this.checked ? "removeClass" : "addClass"]("gray");
    //     topicInputs.attr("disabled", !this.checked);
    // });
});