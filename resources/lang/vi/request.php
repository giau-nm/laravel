<?php

return [
    'pageTitle'            => 'Danh sách Request',
    'newRequest'           => 'Mới',
    'acceptedRequest'      => 'Đã chấp thuận',
    'rejectRequest'        => 'Đã từ chối',
    'acceptedRequest_out_of_date'     => "Đã quá hạn",
    'paidRequest'          => "Đã hoàn trả",

    'newRequest_html'           => '<span class="label label-info">Mới</span>',
    'acceptedRequest_html'      => '<span class="label label-success">Đã chấp thuận</span>',
    'rejectRequest_html'        => '<span class="label label-warning">Đã từ chối</span>',
    'acceptedRequest_out_of_date_html'     => '<span class="label label-danger">Đã quá hạn</span>',
    'paidRequest_html'          => '<span class="label label-primary">Đã hoàn trả</span>',

    'longTimeText'         => 'Có',
    'shortTimeText'        => 'Không',
    'addNew'               => 'Thêm mới',
    'saveSuccess'          => 'Lưu Request thành công',
    'notFound'             => 'Không tìm thấy Request',
    'updateSuccess'        => 'Sửa Request thành công',
    'deleteSuccess'        => 'Xóa Request thành công',
    'lbl_column_username' => 'Tên người mượn',
    'lbl_column_project_name' => 'Tên dự án',
    'lbl_column_device_name' => 'Tên thiết bị',
    'lbl_column_status' => 'Tình trạng',
    'lbl_column_is_long_time' => 'Mượn dài hạn',
    'lbl_column_start_time' => 'Ngày dự kiến mượn',
    'lbl_column_end_time' => 'Ngày dự kiến trả',
    'lbl_column_actual_start_time' => 'Ngày mượn thực tế',
    'lbl_column_actual_end_time' => 'Ngày trả thực tế',
    'lbl_column_note' => 'Ghi chú',
    'lbl_column_admin_note' => 'Lý do',
    'expiredRequest'       => 'Yêu cầu thiết bị của bạn đã hết hạn',
    'actualStartTime'      => 'Ngày mượn thực tế',
    'actualEndTime'        => 'Ngày trả thực tế',
    'note'                 => 'Chú thích',
    'requestDetail'        => 'Chi tiết Request',
    'editRequest'          => 'Sửa Request',
    'deleteRequest'        => 'Xóa Request',
    'confirmDeleteRequest' => 'Bạn có chắc chắn muốn xóa request?',
    'multiple_status_select' => [
        'overflow_text'         => 'Đã chọn {n}',
        'no_results_text'       => 'Trạng thái',
    ],
    'error_request_accepted' => 'Request đã được duyệt thì không thể sửa',
    'delete_permission_deny' => 'Bạn không có quyền xóa report này.',
    'device'                 => 'Thiết bị',
    'select_device'          => 'Chọn thiết bị',
    'project'                => 'Dự án',
    'select_project'         => 'Lựa chọn dự án',
    'add_success'            => 'Thêm request thành công.',
    'msg' => [
        'request_not_found'             => 'Không tìm thấy Request',
        'request_change_status_success' => 'Thay đổi trạng thái thành công.',
        'status_request_not_found'      => 'Trạng thái không hợp lệ',
        'device_request_not_found'      => 'Không tìm thấy thiết bị',
        'device_buzy_broken'            => 'Thiết bị đã hỏng hoặc đang được mượn',
        'status_not_change_to_new'      => 'Không thể thay đổi thành request mới',
        'not_change_status_after_set_actual_time' => 'Không thể thay đổi trạng thái của request khi đã bắt đầu cho mượn',
        'cant_change_because_status_new'          => 'Thay đổi trạng thái request để cập nhật dữ liệu',
        'cant_change_status_after_actualtime_set' => 'Không thể thay đổi trạng thái khi đã cho mượn thiết bị',
        'cant_change_islongtime_after_actualtime_set' => 'Không thể thay đổi mượn dài hạn khi đã trả thiết bị',
        'must_set_actual_start_time'                  => 'Phải điền ngày mượn thực tế trước'
    ],
    'mail' => [
        'subject' => 'ADM',
        'dear' => 'Kính gửi',
        'mr_ms' => 'Ông/Bà',
        'after_accept_reject' => 'yêu cầu mượn thiết bị của bạn',
        'device_info' => 'Thông tin thiết bị'
    ]

];