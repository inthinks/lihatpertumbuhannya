<div class="content">
        	<h3 class="tag">#LihatPertumbuhannya</h3>
            <div class="childForm">
                <table>
                    <form method="post" action="<?php echo site_url('calculation_result') ?>" id="formID">
                    <tr>
                        <td><b>Nama</b></td>
                        <td><input type="text" name="nama" required value="<?php if ($this->session->flashdata('name')) echo $this->session->flashdata('name') ?>"></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td class="genderSelect">
                            <select name="jenis_kelamin" id="gender">
                                <option value="1" <?php if ($this->session->flashdata('gender') == 1) echo 'selected'; ?>>Laki-laki</option>
                                <option value="0" <?php if ($this->session->flashdata('gender') == 0) echo 'selected'; ?>>Perempuan</option>
                            </select>
                            <input type="hidden" id="jenis" name="jenis_kelamin">
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td><input id="date" data-format="DD-MM-YYYY" data-template="DD MM YYYY" name="tanggal_lahir" value="01-01-2010" type="text"></td>
                    </tr>
                    <tr>
                        <td><b>Tinggi Badan</b></td>
                        <td class="numField"><input type="text" name="tinggi_badan" value="<?php if ($this->session->flashdata('height')) echo $this->session->flashdata('height') ?>"> cm</td>
                    </tr>
                    <tr>
                        <td><b>Berat Badan</b></td>
                        <td class="numField"><input type="text" name="berat_badan" value="<?php if ($this->session->flashdata('weight')) echo $this->session->flashdata('weight') ?>"> kg</td>
                    </tr>
                    
                </table>
                <div class="btnContainer">
                    <a class="clickArea" href="javascript:void(0)" id="submit"></a>
                    <div class="defBtn">GET RESULT</div>
                </div>
                </form>
            </div>
        </div>
<script>
    $(function(){

        $('#date').combodate({
            firstItem: 'none',
            minYear: 2010,
            maxYear: 2016
        });  
        $("select").selectOrDie({
            size: 8
        });  
    });
</script>