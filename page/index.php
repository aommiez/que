<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:25 AM
 */

?>
<div id="wrapper">
    <div class="application">
        <div class="application-content">
            <a href="sign_in.html"><div class="icon-heart"></div>
                <span>Hospital</span>
            </a>
        </div>
    </div>
    <div class="controls">
        <div class="caret"></div>
        <div class="form-wrapper">
            <h1 class="text-center">Sign in</h1>
            <form accept-charset="UTF-8" action="index.html" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
                <div class="row-fluid">
                    <div class="span12 icon-over-input">
                        <input class="span12" id="email" name="email" placeholder="E-mail" type="text" value="">
                        <i class="icon-user muted"></i>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12 icon-over-input">
                        <input class="span12" id="password" name="password" placeholder="Password" type="password" value="">
                        <i class="icon-lock muted"></i>
                    </div>
                </div>
                <button class="btn btn-block" name="button" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>