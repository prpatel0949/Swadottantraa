@if ($current_question == 1)
    @if ($answer == 1)
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> That's great! What will you like us to help for?</div>
                <div class="dropdown-divider mt-3 mb-3"></div>
                <div class="card-options">
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="4"> <span>Brighten up mind</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="5"> <span>Healthy Relations</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="6"> <span>Brain Power</span>
                        <i class="fa fa-check"></i>
                    </label>
                </div>
                <span class="text-danger error"></span>
            </div>
        </div>
    @elseif ($answer == 2)
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> Ohk… Let's know what is bothering you the most..</div>
                <div class="dropdown-divider mt-3 mb-3"></div>
                <div class="card-options">
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="7"> <span>Emotional Stress, Physical Stress, Bad Mood</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="8"> <span>My own habits causing problems for health, work & relations</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="9"> <span>Difficulties in concentration, memory and problem solving</span>
                        <i class="fa fa-check"></i>
                    </label>
                </div>
                <span class="text-danger error"></span>
            </div>
        </div>
    @elseif ($answer == 3)
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> Please don't get disheartened! Let's start sorting the issues with…</div>
                <div class="dropdown-divider mt-3 mb-3"></div>
                <div class="card-options">
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="10"> <span>Mood Management</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="11"> <span>Behavioural  Management</span>
                        <i class="fa fa-check"></i>
                    </label>
                    <label class="card-option form-control">
                        <input name="question_{{ $current_question + 1 }}" type="radio" value="12"> <span>Thoughts Management</span>
                        <i class="fa fa-check"></i>
                    </label>
                </div>
                <span class="text-danger error"></span>
            </div>
        </div>
    @endif

@elseif ($current_question == 2)
    @if ($answer == 4)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="13"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="14"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="15"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>
    @elseif ($answer == 5)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="16"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="17"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="18"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>
    @elseif ($answer == 6)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="19"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="20"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="21"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 7)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="22"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="23"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="24"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 8)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="25"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="26"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="27"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 9)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What would be your preference for this?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="28"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="29"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="30"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 10)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What are you ready for?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="31"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="32"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="33"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 11)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What are you ready for?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="34"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="35"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="36"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @elseif ($answer == 12)
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="card-question"><span class="q_no">{{ $current_question + 1 }}.</span> What are you ready for?</div>
            <div class="dropdown-divider mt-3 mb-3"></div>
            <div class="card-options">
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="37"> <span>Quick solutions</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="38"> <span>In-depth understanding</span>
                    <i class="fa fa-check"></i>
                </label>
                <label class="card-option form-control">
                    <input name="question_{{ $current_question + 1 }}" type="radio" value="39"> <span>Just knowing my status</span>
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <span class="text-danger error"></span>
        </div>
    </div>

    @endif

@endif