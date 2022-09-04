function db_saves()
{
    if(currentTab == 0){
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        medicalstart = document.getElementById('medstartdate').value;
        capturedby = document.getElementById('capturedname').value;
        brokercode = document.getElementById('broker-code').value;
        brokeragename = document.getElementById('advisor-brokeragename').value;
        brokername = document.getElementById('advisor-namesurname').value;
        brokeremail = document.getElementById('advisoremail').value;
        brokertel = document.getElementById('advisor-tel').value;
        console.log(currentTab);
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {currenttab: currenttab, userId: userId, medicalstart: medicalstart, capturedby: capturedby, brokercode: brokercode, brokeragename: brokeragename, brokername: brokername, brokeremail: brokeremail, brokertel: brokertel }
            })
            .done(function( response ) {
                response1 = JSON.parse(response);
                console.log(response1);
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-center"
                  };
                toastr.success(response1['message']);
                userId = response1['userId'];
                document.getElementById('userid').value = userId;
            });
    }
    if(currentTab == 1)
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        policyoption = document.querySelector('input[name="option-radio"]:checked').value;
        incomebound = document.getElementById('incomebound');
        boncapupload = document.getElementById('boncap_upload');

        if (null != incomebound) {
            incomebound = document.getElementById('incomebound').value;
        } else {
            incomebound = '';
        }

        if (null != boncapupload) {
            boncapupload = document.getElementById('boncap_upload').value;
        } else {
            boncapupload = '';
        }
        console.log("ID: " + userId + "Income Band Option : " + incomebound + "Filename : " + boncapupload);
        console.log(userId);
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {currenttab: currenttab, userId: userId, policyoption: policyoption, incomebound: incomebound, boncapupload: boncapupload }
            })
            .done(function( response ) {
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-center"
                  };
                toastr.success(response);
            });
    }

    if(currentTab == 2)
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        idPassType = document.getElementById('idPassType').value;
        mainIdnumber = document.getElementById('mianid-number').value;
        maintitle = document.getElementById('main-title').value;
        mainsurname = document.getElementById('main-surname').value;
        mainfirstname = document.getElementById('main-firstname').value;
        maininitial = document.getElementById('main-initial').value;
        mainmarital = document.getElementById('main-marital').value;
        gender = document.querySelector('input[name="mgender-radio"]:checked').value;
        dob = document.getElementById('m-dob').value;
        language = document.getElementById('main-lang').value;
        race = document.getElementById('m-race').value;
        dependents = document.querySelector('input[name="m-deps-radio"]:checked').value;

        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {currenttab: currenttab, userId: userId,
                idPassType : idPassType, mainIdnumber: mainIdnumber,
                maintitle: maintitle, mainsurname: mainsurname,
                mainfirstname: mainfirstname,  maininitial: maininitial, mainmarital: mainmarital,
                gender: gender, dob: dob, language: language, race: race, dependents: dependents
            }
        })
        .done(function( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
            toastr.success(response);
        });


    }
    if(currentTab == 3)
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        cell = document.getElementById('m-cell').value;
        hometel = document.getElementById('m-telh').value;
        worktel = document.getElementById('m-telw').value;
        taxnumber = document.getElementById('mtax').value;
        email = document.getElementById('m-email').value;
        pobox = document.getElementById('mainid-pobox').value;
        postalstreetnum = document.getElementById('m-psnum').value;
        if(!document.getElementById('m-psname') && !document.getElementById('m-pstype')){
            //return
            postalstreetname = '';
            postalstreetntype = '';
        }else{
            postalstreetname = document.getElementById('m-psname').value;
            postalstreetntype = document.getElementById('m-pstype').value;
        }
        postalsuburb = document.getElementById('m-psuburb').value;
        postalcode = document.getElementById('m-postalcode').value;
        streetnum = document.getElementById('m-ssnum').value;
        streetname = document.getElementById('m-ssname').value;
        streettype = document.getElementById('m-sstype').value;
        suburb = document.getElementById('m-ssuburb').value;
        streetpostalcode = document.getElementById('m-spostalcode').value;

        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {currenttab: currenttab, userId: userId,
                cell: cell, hometel: hometel,
                worktel: worktel, taxnumber: taxnumber,
                email: email, pobox: pobox, postalstreetnum: postalstreetnum,
                postalstreetname: postalstreetname, postalstreetntype: postalstreetntype, postalsuburb: postalsuburb, postalcode: postalcode, postalcode: postalcode,
                streetnum: streetnum, streetname: streetname, streettype: streettype, suburb: suburb, streetpostalcode: streetpostalcode
            }
        })
        .done(function( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
            toastr.success(response);
        });


    }
    //Dependents data

    if(depsconst == 'yes' && currentTab == 4)
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        var counter2 = document.querySelectorAll('.depstart').length;
        counter = 1;
        var value = new Array();
        var depArray = new Array();
        while(counter <= counter2)
        {
            title = document.getElementById('dep'+counter+'-title').value;
            idnum = document.getElementById('d'+counter+'-idpass').value;
            firstname = document.getElementById('d'+counter+'-firstname').value;
            surname = document.getElementById('d'+counter+'-surname').value;
            dob = document.getElementById('d'+counter+'-dob').value;
            marital_status = document.getElementById('d'+counter+'-marital').value;
            race = document.getElementById('d'+counter+'-race').value;
            // gender = document.querySelector('input[name="d'+counter+'-gender-radio"]:checked').value;
            relationship = document.getElementById('d'+counter+'-rel').value;
            contact = document.getElementById('d'+counter+'-contact').value;
            taxnum = document.getElementById('d'+counter+'tax').value;

            if(title || idnum || firstname || surname || dob || marital_status || race || gender || relationship || contact || taxnum)
            {
                if(!title)
                {
                    title = '';
                }

                if(!idnum)
                {
                    idnum = '';
                    gender = '';
                }else{
                    gender = document.querySelector('input[name="d'+counter+'-gender-radio"]:checked').value;
                }

                if(!firstname)
                {
                    firstname = '';
                }

                if(!surname)
                {
                    surname = '';
                }

                if(!dob)
                {
                    dob = '';
                }

                if(!marital_status)
                {
                    marital_status = '';
                }

                if(!race)
                {
                    race = '';
                }

                // if(!gender)
                // {
                //     gender = '';
                // }

                if(!relationship)
                {
                    relationship = '';
                }

                if(!contact)
                {
                    contact = '';
                }

                if(!taxnum)
                {
                    taxnum = '';
                }

                if(idnum != '' && idnum != null )
                {
                    value= [title, idnum, firstname, surname, dob, marital_status, race, gender, relationship, contact, taxnum];
                    depArray.push(value);
                }

            }

            counter++
        }
        console.log(depArray);
            $.ajax({
                method: "POST",
                url: "includes/saves.php",
                data: {currenttab: currenttab, userId: userId, counter: counter2,
                        depArray: depArray, depsconst: depsconst, optionsconst: optionsconst
                }

            })
            .done(function( response ){
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-center"
                  };
                toastr.success(response);
                console.log(response)
            });
    }

    if((depsconst == 'no' && currentTab == 4) || (depsconst == 'yes' && currentTab == 5))
    {
        var banking = '';
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        contribbank = document.getElementById('contrib-bankname').value;
        contribaccnum = document.getElementById('contrib-accnum').value;
        contribacctype = document.getElementById('contrib-acctype').value;
        if(document.getElementById('thirdpartycheckfield').value != 'yes')
        {
            thirdpartycheckfield = 'no';


            contribAccHName = document.getElementById("contrib-accholdname").value;
            contribaccholderid = contribAccHName;
            idNum = document.getElementById("mianid-number").value;
            console.log("From Updates Saves " + contribaccholderid);
            console.log("contribution displayed");
            console.log("ID Number : " + idNum);
            if (contribAccHName === idNum) {
                console.log("reg function start");
                var accholdersurname = document.getElementById('main-surname').value;
                var accholdername = document.getElementById('main-firstname').value;
                contribaccholdsurname = accholdersurname;
                contribaccholdname = accholdername;
                document.getElementById('contributionaccountholder').value = accholdername + ' ' + accholdersurname;

                // console log to check if fields are pulling through correctly uncomment to view
                // console.log('contributionaccount holder : '+document.getElementById('contributionaccountholder').value);
                // console.log(accholdername)
                console.log("Account holder Surname : " + accholdersurname)
            }

            if (depsconst === 'yes') {
                var depcounter = document.getElementById('depcounter').value;
                var counter = 1;
                while(counter <= depcounter)
                {
                    var depId = document.getElementById('d'+counter+'-idpass').value;
                    if (typeof depId != 'undefined') {

                        if (contribAccHName == depId) {
                            var accholdersurname = document.getElementById('d'+counter+'-surname').value;
                            var accholdername = document.getElementById('d'+counter+'-firstname').value;
                            contribaccholdsurname = accholdersurname;
                            contribaccholdname = accholdername;
                            document.getElementById('contributionaccountholder').value = accholdername + ' ' +
                                accholdersurname;

                            // console log to check if fields are pulling through correctly uncomment to view
                            // console.log('contributionaccount holder : '+document.getElementById('contributionaccountholder').value);
                        }
                    }
                    counter++;
                    console.log("Counter for Bank Contrib details :  " + counter);
                }
            }
        }else{
            contribaccholderid = document.getElementById('contrib-accholdid').value;
            contribaccholdname = document.getElementById('contrib-accholdname').value;
            contribaccholdsurname = document.getElementById('contrib-accholdsurname').value;
            thirdpartyidvalid = document.getElementById('thirdpartyidvalid').value;
            thirdpartycheckfield = document.getElementById('thirdpartycheckfield').value;
        }
        contrdebidate = document.querySelector('input[name="contribdate-radio"]:checked').value;
        verification = document.getElementById('contribverification').value;
        if(!document.getElementById('consentupload'))
        {
            consentupload = '';
        }else{
            uploadconsent = document.getElementById('consentupload').value;
            consentupload = uploadconsent;

        }
        console.log("From saves JS" + consentupload);
        //Refunds
        refundbank = document.getElementById('refund-bankname').value;
        refundaccholder = document.getElementById('refund-accholdname').value;
        refundaccnum = document.getElementById('refund-accnum').value;
        refundacctype = document.getElementById('refund-acctype').value;
        checkcontribcopy = document.getElementById('accsamecontrib').value;


        if(document.getElementById('refthirdpartycheckfield').value != 'yes')
        {
            refundaccholderid = '';
            refundaccholdsurname = '';
            refthirdpartycheckfield = 'no';
        }else{
            refundaccholderid = document.getElementById('refund-accholdid').value;
            refundaccholdname = document.getElementById('refund-accholdname').value;
            refundaccholdsurname = document.getElementById('refund-accholdsurname').value;
            refthirdpartycheckfield = document.getElementById('refthirdpartycheckfield').value;
        }
        banking =
                {
                    'userId': userId, 'contribbank': contribbank,
                    'contribaccholdname': contribaccholdname, 'contribaccnum': contribaccnum,
                    'contribacctype': contribacctype, 'contribaccholderid': contribaccholderid,
                    'contribaccholdsurname': contribaccholdsurname, 'contrdebidate': contrdebidate,
                    'refundbank': refundbank, 'refundaccholder': refundaccholder, 'refundaccnum': refundaccnum,
                    'refundacctype': refundacctype, 'refundaccholderid': refundaccholderid,
                    'refundaccholdsurname': refundaccholdsurname, 'checkcontribcopy': checkcontribcopy,
                    'refthirdpartycheckfield': refthirdpartycheckfield, 'thirdpartycheckfield': thirdpartycheckfield, 'verification': verification
                }
        //'thirdpartyidvalid': thirdpartyidvalid,

        console.log(banking)
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {
                currenttab: currenttab, depsconst: depsconst, banking : banking, consentupload: consentupload, optionsconst: optionsconst
            }
        })
        .done(function( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
            toastr.success(response);
        });
        console.log(currentTab);
    }

    if((depsconst == 'no' && currentTab == 5) || (depsconst == 'yes' && currentTab == 6))
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        var counter2 = document.querySelectorAll('.prevmed').length;
        counter = 1;
        var value = new Array();
        var pmArray = new Array();
        while(counter <= counter2)
        {
            namesurname = document.getElementById('prevmed-namesurname'+counter).value;
            medschemename = document.getElementById('prevmed-medscheme'+counter).value;
            memshipnumber = document.getElementById('prevmed-memnum'+counter).value;
            joindate = document.getElementById('prevmed-djoin'+counter).value;
            enddate = document.getElementById('prevmed-dend'+counter).value;

            comupload = document.getElementById('ms'+counter+'upload').value;
            // comupload = $('#com'+counter+'upload').prop('files')[0];
            // comupload_file = new FormData();
            // prevmedcert = comupload_file.append('file', comupload);

            if(namesurname || medschemename || memshipnumber || joindate || enddate || comupload )
            {
                if(!namesurname)
                {
                    namesurname = '';
                }

                if(!medschemename)
                {
                    medschemename = '';
                }

                if(!memshipnumber)
                {
                    memshipnumber = '';
                }

                if(!joindate)
                {
                    joindate = '';
                }

                if(!enddate)
                {
                    enddate = '';
                }


                if(!comupload)
                {
                    comupload = '';
                }
                if(namesurname != '' && namesurname != null)
                {
                    value= [namesurname, medschemename, memshipnumber, joindate, enddate, comupload];
                    pmArray.push(value);
                }
            }
            console.log(pmArray);

            counter++
        }
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {
                currenttab : currenttab,
                userId: userId,
                pmArray: pmArray,
                depsconst : depsconst,
                counter: counter2,
                optionsconst : optionsconst
            }
        })
        .done(function ( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
            toastr.success(response);
            console.log(response)
        });
    }

    if((depsconst == 'no' && currentTab == 6) || (depsconst == 'yes' && currentTab == 7))
    {
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        var counter1 = document.querySelectorAll('.medq1').length;
        var counter11 = 1;
        var counter2 = document.querySelectorAll('.medq2').length;
        var counter21 = 1;
        var counter3 = document.querySelectorAll('.medq3').length;
        var counter31 = 1;
        var counter4 = document.querySelectorAll('.medq4').length;
        var counter41 = 1;

        var value = new Array();
        var mqArray1 = new Array();
        var mqArray2 = new Array();
        var mqArray3 = new Array();
        var mqArray4 = new Array();
        var amqArray = new Array();

        while(counter11 <= counter1){
            console.log(counter11)
            fullname = document.getElementById('medicalquestion1'+counter11+'-name').value;
            illness = document.getElementById('medicalquestion1'+counter11+'-illness').value;
            firsttreatmentdate = document.getElementById('medicalquestion1'+counter11+'-firsttreat').value;
            lasttreatmentdate = document.getElementById('medicalquestion1'+counter11+'-lasttreat').value;
            gpfullname =  document.getElementById('medicalquestion1'+counter11+'-gpspec').value;
            console.log("Counter 11 - Fullname"+fullname)
            console.log("Counter 11 - illness"+illness)
            console.log("Counter 11 - firsttreatmentdate"+firsttreatmentdate)
            console.log("Counter 11 - lasttreatmentdate"+lasttreatmentdate)
            console.log("Counter 11 - gpfullname"+gpfullname)

            if(!fullname)
            {
                fullname = '';
                treated = '';
            }else{
                treated = document.querySelector('input[name="medicalquestion1'+counter11+'-radios"]:checked').value;
            }

            if(!illness)
            {
                illness = '';
            }

            if(!firsttreatmentdate)
            {
                firsttreatmentdate = '';
            }

            if(!lasttreatmentdate)
            {
                lasttreatmentdate = '';
            }

            if(!gpfullname)
            {
                gpfullname = '';
            }

            var medicalquestion = 1;
            if(fullname != '' && fullname != null)
            {
                value = [fullname, illness, treated, firsttreatmentdate, lasttreatmentdate, gpfullname, medicalquestion];
                mqArray1.push(value);
            }

            counter11++;

        }
console.log(mqArray1);
        while(counter21 <= counter2){

            if(!document.getElementById('medicalquestion2'+counter21+'-name').value)
            {
                fullname = '';
            }else{
                var fullname = document.getElementById('medicalquestion2'+counter21+'-name').value;
            }

            if(!document.getElementById('medicalquestion2'+counter21+'-illness').value)
            {
                illness = '';
            }else{
                var illness = document.getElementById('medicalquestion2'+counter21+'-illness').value;
            }

            if($('input[name=medicalquestion2'+counter21+'-radios]:checked').length <= 0)
            {
                treated = '';
            }else{
                var treated = document.querySelector('input[name="medicalquestion2'+counter21+'-radios"]:checked').value;
            }

            if(!document.getElementById('medicalquestion2'+counter21+'-firsttreat').value)
            {
                firsttreatmentdate = '';
            }else{
                var firsttreatmentdate = document.getElementById('medicalquestion2'+counter21+'-firsttreat').value;
            }

            if(!document.getElementById('medicalquestion2'+counter21+'-lasttreat').value)
            {
                lasttreatmentdate = '';
            }else{
                var lasttreatmentdate = document.getElementById('medicalquestion2'+counter21+'-lasttreat').value;
            }

            if(!document.getElementById('medicalquestion2'+counter21+'-gpspec').value)
            {
                gpfullname = '';
            }else{
                var gpfullname =  document.getElementById('medicalquestion2'+counter21+'-gpspec').value;
            }

            var medicalquestion = 2;
            if(fullname != '' && fullname != null)
            {
                value = [fullname, illness, treated, firsttreatmentdate, lasttreatmentdate, gpfullname, medicalquestion];
                mqArray2.push(value);
            }

            counter21++;
        }
        console.log(mqArray2);
        while(counter31 <= counter3){

            if(!document.getElementById('medicalquestion3'+counter31+'-name').value)
            {
                fullname = '';
            }else{
                var fullname = document.getElementById('medicalquestion3'+counter31+'-name').value;
            }

            if(!document.getElementById('medicalquestion3'+counter31+'-illness').value)
            {
                illness = '';
            }else{
                var illness = document.getElementById('medicalquestion3'+counter31+'-illness').value;
            }

            if($('input[name=medicalquestion3'+counter31+'-radios]:checked').length <= 0)
            {
                treated = '';
            }else{
                var treated = document.querySelector('input[name="medicalquestion3'+counter31+'-radios"]:checked').value;
            }

            if(!document.getElementById('medicalquestion3'+counter31+'-firsttreat').value)
            {
                firsttreatmentdate = '';
            }else{
                var firsttreatmentdate = document.getElementById('medicalquestion3'+counter31+'-firsttreat').value;
            }

            if(!document.getElementById('medicalquestion3'+counter31+'-lasttreat').value)
            {
                lasttreatmentdate = '';
            }else{
                var lasttreatmentdate = document.getElementById('medicalquestion3'+counter31+'-lasttreat').value;
            }

            if(!document.getElementById('medicalquestion3'+counter31+'-gpspec').value)
            {
                gpfullname = '';
            }else{
                var gpfullname =  document.getElementById('medicalquestion3'+counter31+'-gpspec').value;
            }

            var medicalquestion = 3;
            if(fullname != '' && fullname != null)
            {
                value = [fullname, illness, treated, firsttreatmentdate, lasttreatmentdate, gpfullname, medicalquestion];
                mqArray3.push(value);
            }
            // mqArray3.push(value);
            counter31++;
        }
        console.log(mqArray3);
        while(counter41 <= counter4){

            if(!document.getElementById('medicalquestion4'+counter41+'-name').value)
            {
                fullname = '';
            }else{
                var fullname = document.getElementById('medicalquestion4'+counter41+'-name').value;
            }

            if(!document.getElementById('medicalquestion4'+counter41+'-illness').value)
            {
                illness = '';
            }else{
                var illness = document.getElementById('medicalquestion4'+counter41+'-illness').value;
            }

            if($('input[name=medicalquestion4'+counter41+'-radios]:checked').length <= 0)
            {
                treated = '';
            }else{
                var treated = document.querySelector('input[name="medicalquestion4'+counter41+'-radios"]:checked').value;
            }

            if(!document.getElementById('medicalquestion4'+counter41+'-firsttreat').value)
            {
                firsttreatmentdate = '';
            }else{
                var firsttreatmentdate = document.getElementById('medicalquestion4'+counter41+'-firsttreat').value;
            }

            if(!document.getElementById('medicalquestion4'+counter41+'-lasttreat').value)
            {
                lasttreatmentdate = '';
            }else{
                var lasttreatmentdate = document.getElementById('medicalquestion4'+counter41+'-lasttreat').value;
            }

            if(!document.getElementById('medicalquestion4'+counter41+'-gpspec').value)
            {
                gpfullname = '';
            }else{
                var gpfullname =  document.getElementById('medicalquestion4'+counter41+'-gpspec').value;
            }

            var medicalquestion = 4;
            if(fullname != '' && fullname != null)
            {
                value = [fullname, illness, treated, firsttreatmentdate, lasttreatmentdate, gpfullname, medicalquestion];
                mqArray4.push(value);
            }
            // mqArray4.push(value);
            counter41++;
        }
        console.log(mqArray4);
        amqArray.push(mqArray1, mqArray2, mqArray3, mqArray4);
        console.log(amqArray);
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {
                currenttab : currenttab,
                userId: userId,
                amqArray: amqArray,
                depsconst : depsconst,
                optionsconst : optionsconst
            }
        })
        .done(function ( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
            toastr.success("Saved Successfully!");
            console.log(response)
        });
    }

    if((depsconst == 'no' && currentTab == 7 && optionsconst == 'select' ) || (depsconst == 'yes' && currentTab == 8 && optionsconst == 'select')){
        currenttab = currentTab;
        userId = document.getElementById('userid').value;
        var counter2 = document.querySelectorAll('.gpnom').length;
        counter = 1;
        var value = new Array();
        var gpnArray = new Array();
        while(counter <= counter2)
        {
            if(!document.getElementById('gpnom'+counter+'-namesurname').value)
            {
                fullname = null;
            }else{
                fullname = document.getElementById('gpnom'+counter+'-namesurname').value;
            }

            if(!document.getElementById('gpnom'+counter+'-firstdocname').value)
            {
                firstdocname = null;
            }else{
                firstdocname = document.getElementById('gpnom'+counter+'-firstdocname').value;
            }

            if(!document.getElementById('gpnom'+counter+'-firstdocpnumber').value)
            {
                firstdocpnum = null;
            }else{
                firstdocpnum = document.getElementById('gpnom'+counter+'-firstdocpnumber').value;
            }

            if(!document.getElementById('gpnom'+counter+'-seconddocname').value)
            {
                seconddocname = null;
            }else{
                seconddocname = document.getElementById('gpnom'+counter+'-seconddocname').value;
            }

            if(!document.getElementById('gpnom'+counter+'-seconddocpnumber').value)
            {
                seconddocpnum = null;
            }else{
                seconddocpnum = document.getElementById('gpnom'+counter+'-seconddocpnumber').value;
            }

            if((fullname != '' && fullname != null) || (firstdocname != '' && firstdocname != null))
            {
                value= [fullname, firstdocname, firstdocpnum, seconddocname, seconddocpnum];
                gpnArray.push(value);
            }

            counter++;
        }
        $.ajax({
            method: "POST",
            url: "includes/saves.php",
            data: {
                currenttab : currenttab,
                userId: userId,
                gpnArray: gpnArray,
                depsconst : depsconst,
                optionsconst : optionsconst,
                counter: counter2
            }
        })
        .done(function ( response ){
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-center"
              };
             toastr.success("Saved Successfully!");
            console.log(response)
        });
    }

    if((depsconst == 'no' && currentTab == 8 && optionsconst == 'select' ) || (depsconst == 'yes' && currentTab == 9 && optionsconst == 'select') || (depsconst == 'yes' && currentTab == 8 && optionsconst != 'select') || (depsconst == 'no' && currentTab == 7 && optionsconst != 'select')){
        currenttab = currentTab;
        userId = document.getElementById('userid').value;

        if(!document.getElementById('tcagree').value)
        {
            terms_agreement = '';
        }else{
            terms_agreement = document.getElementById('tcagree').value;
        }

        if(!document.getElementById('advisor-date').value)
        {
            advisor_dates = '';
        }else{
            advisor_dates = document.getElementById('advisor-date').value;
        }

        if(!document.getElementById('advisor-memfullname').value)
        {
            advisor_memfullname = '';
        }else{
            advisor_memfullname = document.getElementById('advisor-memfullname').value;
        }

        if(!document.getElementById('memdeclare').value)
        {
            mem_declaration = '';
        }else{
            mem_declaration = document.getElementById('memdeclare').value;
        }
        if(!document.getElementById('popi').value)
        {
            popi = '';
        }else{
            popi = document.getElementById('popi').value;
        }

        if(terms_agreement != '' || advisor_dates != '' || advisor_memfullname != '' || mem_declaration != '' || popi != '')
        {
            $.ajax({
                method: "POST",
                url: "includes/saves.php",
                data: {
                    currenttab : currenttab,
                    userId: userId,
                    terms_agreement: terms_agreement,
                    advisor_dates: advisor_dates,
                    advisor_memfullname: advisor_memfullname,
                    mem_declaration: mem_declaration,
                    depsconst : depsconst,
                    optionsconst : optionsconst,
                    popi: popi
                }
            })
            .done(function ( response ){
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-center"
                  };
                 toastr.success(response);
            });
        }
    }
}
