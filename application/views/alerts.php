<div class="card">
    <div class="card-body">
        <p>اسناد زیر جهت ارزیابی و ادامه فرآیند الزامی ست.</p>
        <ul>
            <li>سند ملک</li>
            <li>گزارش ارزش گذاری</li>
            <li>مستندات طراحی پروژه</li>

            <?php if(!$this->config->item('CENTRALBANKVERSION')){ ?>
            <li>
                سپیدنامه
                <a class="btn btn-success" target="_blank" href="<?php echo base_url('WhitePaper.docx'); ?>">دانلود فایل نمونه</a>
                <b>فایل سپیدنامه را دریافت کرده و بعد از تکمیل فایل، مجددا بارگذاری نمائید.</b>
            </li>
            <?php } ?>

        </ul>
    </div>
</div>