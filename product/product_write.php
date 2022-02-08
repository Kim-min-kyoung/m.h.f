<?php include_once '../include/header.php' ?>
    <main>
        <div id="product_inner" class="innerCon">
            <div id="create_title">
                <h1>상품 등록</h1>
            </div>
            <form action="../process/product_write_process.php" method="post" enctype="multipart/form-data">
                <table id="product_Ctable">
                    <tr>
                        <th>상품 그룹</th>
                        <td>
                            <input type="radio" name="prd_group" value="LIGHTING" /> 조명
                            <input type="radio" name="prd_group" value="FURGNISHINGS" /> 가구
                            <input type="radio" name="prd_group" value="COOKING" /> 주방용품
                        </td>
                    </tr> 
                    <tr>
                        <th>상품명</th>
                        <td><input type="text" name="prd_name" /></td>
                    </tr>
                    <tr>
                        <th>상품가격</th>
                        <td><input type="text" name="prd_price" /></td>
                    </tr>
                    <tr>
                        <th>이미지 등록</th>
                        <td><input type="file" name="prd_photo" /></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td>
                            <textarea name="prd_content" id="prd_content" cols="50" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="btn">
                            <input type="submit" value="등록" />
                            <input type="reset" value="취소" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>   