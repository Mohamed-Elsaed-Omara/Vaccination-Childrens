<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافة تطعيم</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('Vaccination') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="InputName">اسم التطعيم</label>
                                                <input type="text" class="form-control" id="InputName" name="name"
                                                    aria-describedby="emailHelp">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="InputDesc">الوصف</label>
                                                <textarea type="text" class="form-control" rows="10" id="InputDesc" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputAge">العمر المناسب بالشهور</label>
                                                <input type="number" class="form-control" id="InputAge" name="ageInmonths" placeholder="شهر">
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">اغلاق</button>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>