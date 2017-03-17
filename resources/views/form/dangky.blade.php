{{-- neu mang bao loi co phan tu thi in cac loi ra --}}
<!-- @if (count($errors)>0)
<ul>
	@foreach ($errors -> all() as $error)
	<li> {!! $error !!} </li>
	@endforeach
</ul>
@endif -->

<form  enctype="multipart/form-data" action="{!! route('postDangKy') !!}" method="POST" name="frmThem"> {{-- postDangKy o controller --}}
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Môn học</td>
			<td><input type="" name="txtMonHoc">
				{!! $errors->first('txtMonHoc') !!}
			</td>
		</tr>
		<tr>
			<td>Giá tiền</td>
			<td><input type="" name="txtGiaTien">
				{!! $errors->first('txtGiaTien') !!}
			</td>
		</tr>
		<tr>
			<td>Giảng viên</td>
			<td><input type="" name="txtGiangVien">
				{!! $errors->first('txtGiangVien') !!}
			</td>
		</tr>
		<tr>
			<td>Hình ảnh</td>
			<td> <input type="file" name="fImages">
				{!! $errors->first('fImages') !!} </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnGui" value="Thêm"></td>
			</tr>
		</table>
	</form>