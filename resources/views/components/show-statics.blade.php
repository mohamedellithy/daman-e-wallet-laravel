<div class="col-sm-12 col-md-12 col-lg-8 text-left">
    <div class="col-md-4 col-lg-4 col-sm-4 float-left">
        <div class="skill-section">
            <div class="circle-wrapper">
                <div class="circle-entry clearfix">
                    <div class="circle center-block color-dark-2" data-startdegree="0" data-dimension="180" data-text="<strong class='number'>{{ auth()->user()->withdraws_value ?? 0 }}</strong><div class='title-round'>{{ Option('app_Currency') }}</div>" data-width="5" data-fontsize="17" data-percent="90" data-fgcolor="#808080"
                        data-bgcolor="transparent" data-bordersize="2">
                    </div>
                </div>
                <p style="font-weight:bold">{{ __('master.withdraw_value') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-4 float-left">
        <div class="skill-section">
            <div class="circle-wrapper">
                <div class="circle-entry clearfix">
                    <div class="circle center-block color-dark-2" data-startdegree="0" data-dimension="180" data-text="<strong class='number'>{{ auth()->user()->wallet_value ?? 0 }}</strong><div class='title-round'>{{ Option('app_Currency') }}</div>" data-width="5" data-fontsize="17" data-percent="65" data-fgcolor="#808080"
                        data-bgcolor="transparent" data-bordersize="2"></div>
                </div>
                <p style="font-weight:bold">{{ __('master.wallet_balance') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-4 float-left">
        <div class="skill-section">
            <div class="circle-wrapper">
                <div class="circle-entry clearfix">
                    <div class="circle center-block color-dark-2" data-startdegree="0" data-dimension="180" data-text="<strong class='number'>{{ auth()->user()->payments_count  ?? 0}}</strong><div class='title-round'>{{ __('master.order') }}</div>" data-width="5" data-fontsize="17" data-percent="45" data-fgcolor="#808080"
                        data-bgcolor="transparent" data-bordersize="2"></div>
                </div>
                <p style="font-weight:bold">{{ __('master.payments_count') }}</p>
            </div>
        </div>
    </div>
</div>
