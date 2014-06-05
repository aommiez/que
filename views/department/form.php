<div class='row-fluid'>
                    <div class='span12'>
                        <div class='page-header'>
                            <h1 class='pull-left'>
                                <i class='icon-ok'></i>
                                <span>Department Form</span>
                            </h1>
                        </div>
                    </div>
                </div>
<div class='row-fluid'>
                    <div class='span12 box'>
                        <div class='box-header red-background'>
                            <div class='title'>Add Department</div>
                        </div>
                        <div class='box-content'>
                            <form class='form form-horizontal validate-form' method="post" style='margin-bottom: 0;' />
                                <div class='control-group'>
                                    <label class='control-label' for='title'>Config name</label>
                                    <div class='controls'>
                                        <input data-rule-minlength='2' data-rule-required='true' id='title' name='title' placeholder='Name' type='text' />
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>Department</label>
                                    <div class='controls'>
                                        <label class='checkbox'>
                                            <input type='checkbox' name="department[]" value='' />
                                            Department 1
                                        </label>
                                        <label class='checkbox'>
                                            <input type='checkbox' name="department[]" value='' />
                                            Department 2
                                        </label>
                                        <label class='checkbox'>
                                            <input type='checkbox' name="department[]" value='' />
                                            Department 3
                                        </label>
                                    </div>
                                </div>

                                <div class='form-actions' style='margin-bottom:0'>
                                    <button class='btn btn-primary' type='submit'>
                                        <i class='icon-save'></i>
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>