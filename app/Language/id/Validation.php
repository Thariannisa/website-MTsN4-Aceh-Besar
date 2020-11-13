<?php

/**
 * Validation language strings.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2019 British Columbia Institute of Technology
 * Copyright (c) 2019-2020 CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
 *
 * @codeCoverageIgnore
 */

return [
	// Core Messages
	'noRuleSets'            => 'Tidak ada aturan yang ditentukan dalam konfigurasi Validasi.',
	'ruleNotFound'          => '{0} bukan sebuah aturan yang valid.',
	'groupNotFound'         => '{0} bukan sebuah grup aturan validasi.',
	'groupNotArray'         => '{0} grup aturan harus berupa sebuah array.',
	'invalidTemplate'       => '{0} bukan sebuah template Validasi yang valid.',

	// Rule Messages
	'alpha'                 => 'kolom {field} hanya boleh mengandung karakter alfabet.',
	'alpha_dash'            => 'kolom {field} hanya boleh berisi karakter alfanumerik, setrip bawah, dan tanda pisah.',
	'alpha_numeric'         => 'kolom {field} hanya boleh berisi karakter alfanumerik.',
	'alpha_numeric_space'   => 'kolom {field} hanya boleh berisi karakter alfanumerik dan spasi.',
	'alpha_space'  			=> 'kolom {field} hanya boleh berisi karakter alfabet dan spasi.',
	'decimal'               => 'kolom {field} harus mengandung sebuah angka desimal.',
	'differs'               => 'kolom {field} harus berbeda dari bidang {param}.',
	'equals'                => 'The {field} field must be exactly: {param}.',
	'exact_length'          => 'kolom {field} harus tepat {param} panjang karakter.',
	'greater_than'          => 'kolom {field} harus berisi sebuah angka yang lebih besar dari {param}.',
	'greater_than_equal_to' => 'kolom {field} harus berisi sebuah angka yang lebih besar atau sama dengan {param}.',
	'in_list'               => 'kolom {field} harus salah satu dari: {param}.',
	'integer'               => 'kolom {field} harus mengandung bilangan bulat.',
	'is_natural'            => 'kolom {field} hanya boleh berisi angka.',
	'is_natural_no_zero'    => 'kolom {field} hanya boleh berisi angka dan harus lebih besar dari nol.',
	'is_not_unique'         => 'The {field} field must contain a previously existing value in the database.',
	'is_unique'             => 'kolom {field} harus mengandung sebuah nilai unik.',
	'less_than'             => 'kolom {field} harus berisi sebuah angka yang kurang dari {param}.',
	'less_than_equal_to'    => 'kolom {field} harus berisi sebuah angka yang kurang dari atau sama dengan {param}.',
	'matches'               => 'kolom {field} tidak cocok dengan bidang {param}.',
	'max_length'            => 'kolom {field} tidak bisa melebihi {param} panjang karakter.',
	'min_length'            => 'kolom {field} setidaknya harus {param} panjang karakter.',
	'not_equals'            => 'The {field} field cannot be: {param}.',
	'numeric'               => 'kolom {field} hanya boleh mengandung angka.',
	'regex_match'           => 'kolom {field} tidak dalam format yang benar.',
	'required'              => 'kolom {field} diperlukan.',
	'required_with'         => 'kolom {field} diperlukan saat {param} hadir.',
	'required_without'      => 'kolom {field} diperlukan saat {param} tidak hadir.',
	'timezone'              => 'kolom {field} harus berupa sebuah zona waktu yang valid.',
	'valid_base64'          => 'kolom {field} harus berupa sebuah string base64 yang valid.',
	'valid_email'           => 'kolom {field} harus berisi sebuah alamat email yang valid.',
	'valid_emails'          => 'kolom {field} harus berisi semua alamat email yang valid.',
	'valid_ip'              => 'kolom {field} harus berisi sebuah IP yang valid.',
	'valid_url'             => 'kolom {field} harus berisi sebuah URL yang valid.',
	'valid_date'            => 'kolom {field} harus berisi sebuah tanggal yang valid.',

	// Credit Cards
	'valid_cc_num'          => '{field} tidak tampak sebagai sebuah nomor kartu kredit yang valid.',

	// Files
	'uploaded'              => '{field} bukan sebuah berkas diunggah yang valid.',
	'max_size'              => '{field} terlalu besar dari sebuah berkas.',
	'is_image'              => '{field} bukan berkas gambar diunggah yang valid.',
	'mime_in'               => '{field} tidak memiliki sebuah tipe mime yang valid.',
	'ext_in'                => '{field} tidak memiliki sebuah ekstensi berkas yang valid.',
	'max_dims'              => '{field} bukan gambar, atau terlalu lebar atau tinggi.',
];
