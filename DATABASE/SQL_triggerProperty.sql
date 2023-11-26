CREATE TRIGGER TG_PROPERTY_INSERT_AUTOCODE
ON Property
FOR INSERT
AS
BEGIN
	DECLARE @ID INT, @MATINH VARCHAR(2), @LOAIHINH VARCHAR(2), @NAMHT VARCHAR(2), @THANGHT VARCHAR(2), @MAX INT, @Property_Code VARCHAR(15), @Property_Name NVARCHAR(50), @Property_Type_ID INT, 
	@Description NVARCHAR, @District_ID INT, @Address NVARCHAR(100), @Area INT, @Bed_Room INT, @Bath_Room INT, @Price NUMERIC(18,0),
	@Installment_Rate FLOAT, @Avatar NVARCHAR(MAX), @Album NVARCHAR(MAX), @Property_Status_ID INT
	SET @ID = (SELECT ID FROM inserted)
	SET @MATINH = '79' --79: HCM . other: 80:Long An, 82:Tien Giang	,...https://thuvienphapluat.vn/chinh-sach-phap-luat-moi/vn/thoi-su-phap-luat/tu-van-phap-luat/30387/ma-63-tinh-thanh-pho-su-dung-tren-the-can-cuoc-cong-dan 
	SET @LOAIHINH = 'BT' --BT: Biet thu, CH: Can Ho, CC: Chung cu,...
	SET @NAMHT = CONVERT(VARCHAR(2),RIGHT(YEAR(GETDATE()),2))
	SET @THANGHT = CONVERT(VARCHAR(2), MONTH(GETDATE()))
	IF NOT EXISTS (SELECT 1 FROM Property WHERE SUBSTRING(Property_Code,3,2)=@NAMHT)
		SET @MAX = 1
	ELSE
		SET @MAX = (SELECT MAX(RIGHT(Property_Code,5)) FROM Property WHERE SUBSTRING(Property_Code,3,2)=@NAMHT) + 1
	SET @Property_Code = @MATINH+@NAMHT+@THANGHT+@LOAIHINH+RIGHT('0000'+CONVERT(VARCHAR(5), @MAX),5)
	SET @Property_Name = (SELECT Property_Name FROM inserted)
	SET @Property_Type_ID = (SELECT Property_Type_ID FROM inserted)
	SET @Description = (SELECT Description FROM inserted)
	SET @District_ID = (SELECT District_ID FROM inserted)
	SET @Address = (SELECT Address FROM inserted)
	SET @Area = (SELECT Area FROM inserted)
	SET @Bed_Room = (SELECT Bed_Room FROM inserted)
	SET @Bath_Room = (SELECT Bath_Room FROM inserted)
	SET @Price = (SELECT Price FROM inserted)
	SET @Installment_Rate = (SELECT Installment_Rate FROM inserted)
	SET @Avatar= (SELECT Avatar FROM inserted)
	SET @Album = (SELECT Album FROM inserted)
	SET @Property_Status_ID = (SELECT Property_Status_ID FROM inserted)

	UPDATE Property SET Property_Code=@Property_Code WHERE ID=@ID
END

/* Các câu lệnh xóa data có sẵn
DELETE FROM PROPERTY Xóa property trước khi test
*/

/* Test insert
SELECT * FROM PROPERTY

INSERT INTO Property(Property_Name,Property_Type_ID,Description,District_ID,
					Address, Area, Bed_Room, Bath_Room, Price, Installment_Rate, Avatar, Album,Property_Status_ID)
VALUES(N'CHUNG CU TRONG TAN',4,N'gan cong vien, cirlce K, ministop',3,N'496 Duong Quang Ham, Q.Go Vap, TP.HCM',
		1000,5,5,1234567890,7.99,'cctrongtan.jpg','listcctrongtan.jpg',5)

INSERT INTO Property(Property_Name,Property_Type_ID,Description,District_ID,
					Address, Area, Bed_Room, Bath_Room, Price, Installment_Rate, Avatar, Album,Property_Status_ID)
VALUES(N'BIET THU VAN THINH PHAT',4,N'gan Sacombank, coopmart,...',3,N'684 Phan Van Tri, Q.Go Vap, TP.HCM',
1000,5,5,1234567890,7.99,'btvanthinhphat.jpg','listvtphat.jpg',4)
*/