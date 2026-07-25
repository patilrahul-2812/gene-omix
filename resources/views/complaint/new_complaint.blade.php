    @extends('layouts.front_layout')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xxl-9">
                    <div class="flash_messages">
                        @include('flash_messages.admin_message')
                    </div>
                    <div class="p-5 bg-white shadow">
                        <h1 class="text-center mb-5 fs-4">New Complaint</h1>
                        <h1 class="text-center mb-5 fs-4" id="pleasewait" style="display:none">Please Wait...</h1>
                        {!! Form::open(['method' => 'POST', 'route' => ['submit_new_complaint'], 'files' => 'true', 'id' => 'signUpForm']) !!}
                            <!-- start step indicators -->
                            <!-- 'id' => 'signUpForm' -->

                            <!-- step Four -->
                            <div class="step" style="display:none">
                                <p class="step-title text-center mb-4">Complaint Details</p>
                                <div class="row">
                                    <div class="form_group col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Determination of Vigilance Angle</label>
                                            {!! Form::select('determinationof_vigilance_angle_id', $determinationofvigilanceangle_list, null, ['class' => 'form-select', 'placeholder' => 'Select', 'required'=>"true"]) !!}
                                        </div>
                                    </div>
                                    <div class="form_group col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Complaint Description(Max 3000 Characters)</label>
                                            {!! Form::textarea('complaint_description', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => "3000",  'required'=>"true"]) !!}
                                        </div>
                                    </div>
                                    <div class="form_group col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Remarks(Max 3000 Characters)</label>
                                            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'maxlength' => "3000", 'rows' => 2]) !!}
                                        </div>
                                    </div>
                                    <div class="form_group col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Attach Document</label>
                                            <input class="form-control" type="file" name="complaint_document">
                                            <span>(.pdf only)(Max. File size 3MB)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- start previous / next buttons -->
                            <div class="form-footer mt-4 d-flex">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
                            </div>
                            <!-- end previous / next buttons -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

        <script>
            $.validator.addMethod("fileExtension", function(value, element, param) {
                param = typeof param === "string" ? param.replace(/,/g, "|") : "pdf";
                return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
            }, "Please Choose Only pdf file (pdf).");

            $.validator.addMethod('filesize', function (value, element, param) {
                if(element.files.length > 0){
                    var size=element.files[0].size;
                    size=size/1024;
                    size=Math.round(size);
                }
                return this.optional(element) || size <=param ;
            }, 'File size must be less than {0}');

            $('form#signUpForm').validate({
                rules:{
                    'complaint_document':{
                        fileExtension: "pdf",
                        filesize : 3078            // This is kb value
                    },
                },
                messages:{
                    'complaint_document': {
                        fileExtension: "Please Choose Only .pdf File",
                        filesize: "File size must be less than 3 MB"
                    },
                },

                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form_group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z]+$/.test(value);
            }, "Only Letters Allowed");

            // jQuery.validator.addMethod("pan_no_validate", function(value, element) {
            //     return this.optional(element) || /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/.test(value);
            // }, 'Please enter a valid PAN No.');

            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("step");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }
                //... and run a function that will display the correct step indicator:
                // fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("step");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("signUpForm").submit();
                    // return false;
                    // window.location.href="success.html";
                    document.getElementById("signUpForm").style.display = "none";
                    document.getElementById("pleasewait").style.display = "block";
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                return $('form#signUpForm').valid();//valid; // return the valid status
            }


        </script>
    @endsection