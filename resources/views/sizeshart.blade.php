@extends('layouts.app')

@section('title', 'جدول المقاسات - متجر ترياق')

@section('content')
<div class="size-chart-page">
    <div class="container">
        <h1 class="text-center mb-5">جدول المقاسات</h1>
        
        <div class="size-chart-container">
            <h2 class="mb-4">مقاسات الملابس للرجال</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>المقاس</th>
                        <th>الصدر (سم)</th>
                        <th>الخصر (سم)</th>
                        <th>الورك (سم)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>S</td>
                        <td>88-96</td>
                        <td>73-81</td>
                        <td>88-96</td>
                    </tr>
                    <tr>
                        <td>M</td>
                        <td>96-104</td>
                        <td>81-89</td>
                        <td>96-104</td>
                    </tr>
                    <tr>
                        <td>L</td>
                        <td>104-112</td>
                        <td>89-97</td>
                        <td>104-112</td>
                    </tr>
                    <tr>
                        <td>XL</td>
                        <td>112-120</td>
                        <td>97-105</td>
                        <td>112-120</td>
                    </tr>
                    <tr>
                        <td>2XL</td>
                        <td>120-128</td>
                        <td>105-113</td>
                        <td>120-128</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="mt-5 mb-4">مقاسات الملابس للنساء</h2>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>المقاس</th>
                        <th>الصدر (سم)</th>
                        <th>الخصر (سم)</th>
                        <th>الورك (سم)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>S</td>
                        <td>82-89</td>
                        <td>65-72</td>
                        <td>91-98</td>
                    </tr>
                    <tr>
                        <td>M</td>
                        <td>89-96</td>
                        <td>72-79</td>
                        <td>98-105</td>
                    </tr>
                    <tr>
                        <td>L</td>
                        <td>96-103</td>
                        <td>79-86</td>
                        <td>105-112</td>
                    </tr>
                    <tr>
                        <td>XL</td>
                        <td>103-110</td>
                        <td>86-93</td>
                        <td>112-119</td>
                    </tr>
                    <tr>
                        <td>2XL</td>
                        <td>110-117</td>
                        <td>93-100</td>
                        <td>119-126</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="size-guide mt-5">
            <h3>كيفية قياس مقاسك</h3>
            <ul>
                <li><strong>الصدر:</strong> قم بقياس محيط الجزء الأكبر من صدرك.</li>
                <li><strong>الخصر:</strong> قم بقياس محيط خصرك عند أضيق نقطة.</li>
                <li><strong>الورك:</strong> قم بقياس محيط الجزء الأكبر من وركك.</li>
            </ul>
            <p>للحصول على أفضل نتيجة، استخدم شريط قياس واطلب المساعدة من شخص آخر للقياس.</p>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .size-chart-page {
        padding: 50px 0;
        background-color: #ffffff;
    }

    .size-chart-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .table {
        margin-bottom: 0;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .thead-dark th {
        background-color: #2c3e50;
        color: #fff;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .size-guide {
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .size-guide ul {
        padding-right: 20px;
        list-style-type: none;
    }

    .size-guide li {
        margin-bottom: 10px;
        color: #2c3e50;
    }

    h1, h2, h3 {
        color: #2c3e50;
    }

    strong {
        color: #2c3e50;
    }
</style>
@endsection