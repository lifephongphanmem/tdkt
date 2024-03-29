USE [ThiDuaKhenThuong]
GO
/****** Object:  Table [dbo].[DSDiaBan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DSDiaBan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madiaban] [nvarchar](255) NOT NULL,
	[tendiaban] [nvarchar](255) NULL,
	[capdo] [nvarchar](255) NULL,
	[ghichu] [nvarchar](max) NULL,
	[madonviQL] [nvarchar](255) NULL,
	[madiabanQL] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DSDonVi]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DSDonVi](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madonvi] [nvarchar](50) NOT NULL,
	[maqhns] [nvarchar](50) NULL,
	[tendonvi] [nvarchar](100) NULL,
	[diachi] [nvarchar](100) NULL,
	[sodt] [nvarchar](50) NULL,
	[cdlanhdao] [nvarchar](50) NULL,
	[lanhdao] [nvarchar](50) NULL,
	[cdketoan] [nvarchar](50) NULL,
	[ketoan] [nvarchar](50) NULL,
	[songuoi] [float] NOT NULL,
	[macqcq] [nvarchar](50) NULL,
	[diadanh] [nvarchar](50) NULL,
	[nguoilapbieu] [nvarchar](50) NULL,
	[madvbc] [nvarchar](50) NULL,
	[capdonvi] [nvarchar](50) NULL,
	[caphanhchinh] [nvarchar](50) NOT NULL,
	[maphanloai] [nvarchar](50) NULL,
	[phanloaixa] [nvarchar](50) NULL,
	[phanloainguon] [nvarchar](255) NULL,
	[linhvuchoatdong] [nvarchar](255) NULL,
	[ngaydung] [date] NULL,
	[chuyendoi] [float] NOT NULL,
	[trangthai] [nvarchar](255) NULL,
	[sotk] [nvarchar](255) NULL,
	[tennganhang] [nvarchar](255) NULL,
	[madinhdanh] [nvarchar](255) NULL,
	[chucnang] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[madiaban] [nvarchar](50) NULL,
 CONSTRAINT [PK__DSDonVi__3213E83FF18DC3EB] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  View [dbo].[view_DiaBan_DonVi]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[view_DiaBan_DonVi]
AS
SELECT        dbo.DSDiaBan.madiaban, dbo.DSDiaBan.tendiaban, dbo.DSDiaBan.capdo, dbo.DSDiaBan.madiabanQL, dbo.DSDiaBan.madonviQL, dbo.DSDonVi.madonvi, dbo.DSDonVi.tendv, dbo.DSDonVi.nhaplieu, dbo.DSDonVi.tonghop, 
                         dbo.DSDonVi.hethong, dbo.DSDonVi.chucnangkhac
FROM            dbo.DSDiaBan INNER JOIN
                         dbo.DSDonVi ON dbo.DSDiaBan.madiaban = dbo.DSDonVi.madiaban
GO
/****** Object:  Table [dbo].[chongmycanhan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chongmycanhan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chongmygiadinh]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chongmygiadinh](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chongphapcanhan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chongphapcanhan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dangkytd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangkytd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kihieudhtd] [nvarchar](255) NOT NULL,
	[plphongtrao] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tendtkt] [nvarchar](255) NULL,
	[phucapld] [nvarchar](255) NULL,
	[chucdanhld] [nvarchar](255) NULL,
	[chucvu] [nvarchar](255) NULL,
	[dvdcct] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[ngayky] [date] NULL,
	[nguoiky] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[truquan] [nvarchar](255) NULL,
	[ghichu] [nvarchar](max) NULL,
	[tenqt] [nvarchar](255) NULL,
	[macanbo] [nvarchar](255) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[nam] [nvarchar](255) NULL,
	[trangthai] [nvarchar](255) NULL,
	[ngaychuyen] [date] NULL,
	[nguoichuyen] [nvarchar](255) NULL,
	[ngaynhan] [date] NULL,
	[lido] [nvarchar](max) NULL,
	[totrinh] [nvarchar](255) NULL,
	[qdkt] [nvarchar](255) NULL,
	[bienban] [nvarchar](255) NULL,
	[tailieukhac] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ttthaotac] [nvarchar](255) NULL,
	[noidung] [nvarchar](255) NULL,
	[slcanhan] [float] NOT NULL,
	[sltapthe] [float] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[tungay] [date] NULL,
	[denngay] [date] NULL,
	[phamviapdung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dangkytd_khenthuong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangkytd_khenthuong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[stt] [int] NOT NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madanhhieutd] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[soluong] [int] NULL,
	[sotien] [float] NULL,
	[phanloai] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dangkytd_tieuchuan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangkytd_tieuchuan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[stt] [int] NOT NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madanhhieutd] [nvarchar](255) NULL,
	[matieuchuandhtd] [nvarchar](255) NULL,
	[tentieuchuandhtd] [nvarchar](255) NULL,
	[cancu] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[batbuoc] [bit] NOT NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dangkytdct]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangkytdct](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madktdct] [nvarchar](255) NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dangkytddf]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangkytddf](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madktdct] [nvarchar](255) NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmdanhhieutd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmdanhhieutd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madanhhieutd] [nvarchar](255) NOT NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[stt] [int] NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[apdung] [nvarchar](50) NULL,
 CONSTRAINT [PK__dmdanhhi__3213E83F5200900F] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmhinhthuckt]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmhinhthuckt](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mahinhthuckt] [nvarchar](255) NOT NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmloaihinhthuckt]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmloaihinhthuckt](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maloaihinhkt] [nvarchar](255) NOT NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmphanloaict]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmphanloaict](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maplct] [nvarchar](255) NOT NULL,
	[mapl] [nvarchar](255) NULL,
	[tenplct] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmphanloaidt]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmphanloaidt](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mapl] [nvarchar](255) NOT NULL,
	[tenpl] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmphanloaiqd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmphanloaiqd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maplqd] [nvarchar](255) NOT NULL,
	[tenplqd] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmquoctich]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmquoctich](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maqt] [nvarchar](255) NOT NULL,
	[tenqt] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[dmtieuchuandhtd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dmtieuchuandhtd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[matieuchuandhtd] [nvarchar](255) NOT NULL,
	[tentieuchuandhtd] [nvarchar](255) NULL,
	[madanhhieutd] [nvarchar](255) NULL,
	[cancu] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[stt] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DSTaiKhoan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DSTaiKhoan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tentaikhoan] [nvarchar](255) NULL,
	[username] [nvarchar](255) NOT NULL,
	[password] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[email] [nvarchar](255) NULL,
	[trangthai] [int] NOT NULL,
	[sadmin] [nvarchar](255) NULL,
	[permission] [nvarchar](max) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[lydo] [nvarchar](max) NULL,
	[solandn] [int] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[tonghop] [bit] NULL,
	[hethong] [bit] NULL,
	[nhaplieu] [bit] NULL,
	[chucnangkhac] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HeThongChung]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HeThongChung](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[phanloai] [nvarchar](255) NULL,
	[tendonvi] [nvarchar](255) NULL,
	[maqhns] [nvarchar](255) NULL,
	[diachi] [nvarchar](255) NULL,
	[dienthoai] [nvarchar](255) NULL,
	[thutruong] [nvarchar](255) NULL,
	[ketoan] [nvarchar](255) NULL,
	[nguoilapbieu] [nvarchar](255) NULL,
	[diadanh] [nvarchar](255) NULL,
	[setting] [nvarchar](max) NULL,
	[thongtinhd] [nvarchar](max) NULL,
	[emailql] [nvarchar](255) NULL,
	[tendvhienthi] [nvarchar](255) NULL,
	[tendvcqhienthi] [nvarchar](255) NULL,
	[ipf1] [nvarchar](255) NULL,
	[ipf2] [nvarchar](255) NULL,
	[ipf3] [nvarchar](255) NULL,
	[ipf4] [nvarchar](255) NULL,
	[ipf5] [nvarchar](255) NULL,
	[solandn] [int] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[hiepykhenthuong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[hiepykhenthuong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mahiepy] [nvarchar](255) NOT NULL,
	[tendoituong] [nvarchar](255) NULL,
	[noidung] [nvarchar](255) NULL,
	[ykien] [nvarchar](255) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ktctubnd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ktctubnd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ktthutuong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ktthutuong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[kyniemchuong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[kyniemchuong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[loaikt] [nvarchar](255) NULL,
	[dhkt] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[noitrkhen] [nvarchar](255) NULL,
	[sodd] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[cvchohn] [nvarchar](255) NULL,
	[loaihskc] [nvarchar](255) NULL,
	[tgiantgkc] [date] NULL,
	[tgiankcqd] [nvarchar](255) NULL,
	[ngaynhap] [date] NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[laphosotd]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[laphosotd](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tendtkt] [nvarchar](255) NULL,
	[phucapld] [nvarchar](255) NULL,
	[chucdanhld] [nvarchar](255) NULL,
	[chucvu] [nvarchar](255) NULL,
	[dvdcct] [nvarchar](255) NULL,
	[soqd] [nvarchar](255) NULL,
	[ngayky] [date] NULL,
	[nguoiky] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[namsinh] [date] NULL,
	[chinhquan] [nvarchar](255) NULL,
	[truquan] [nvarchar](255) NULL,
	[ghichu] [nvarchar](max) NULL,
	[tenqt] [nvarchar](255) NULL,
	[macanbo] [nvarchar](255) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[nam] [nvarchar](255) NULL,
	[trangthai] [nvarchar](255) NULL,
	[trangthaihuyen] [nvarchar](255) NULL,
	[ngaychuyen] [date] NULL,
	[nguoichuyen] [nvarchar](255) NULL,
	[ngaynhan] [date] NULL,
	[lido] [nvarchar](max) NULL,
	[totrinh] [nvarchar](255) NULL,
	[qdkt] [nvarchar](255) NULL,
	[bienban] [nvarchar](255) NULL,
	[tailieukhac] [nvarchar](255) NULL,
	[ttthaotac] [nvarchar](255) NULL,
	[madonvi] [nvarchar](50) NULL,
	[macqcq] [nvarchar](50) NULL,
	[plphongtrao] [nvarchar](255) NULL,
	[noidung] [nvarchar](255) NULL,
	[slcanhan] [float] NOT NULL,
	[sltapthe] [float] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[kihieudhtd] [nvarchar](50) NULL,
 CONSTRAINT [PK__laphosot__3213E83FA2C27B5F] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[laphosotd_khenthuong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[laphosotd_khenthuong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[stt] [int] NOT NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madanhhieutd] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[maccvc] [nvarchar](255) NULL,
	[tendt] [nvarchar](255) NULL,
	[ngaysinh] [date] NULL,
	[gioitinh] [nvarchar](255) NULL,
	[chucvu] [nvarchar](255) NULL,
	[lanhdao] [bit] NULL,
	[madonvi] [nvarchar](255) NULL,
	[tendonvi] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[madonvi_kt] [nvarchar](255) NULL,
	[lydo] [nvarchar](255) NULL,
	[ketqua] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[laphosotd_tieuchuan]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[laphosotd_tieuchuan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[stt] [int] NOT NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madanhhieutd] [nvarchar](255) NULL,
	[matieuchuandhtd] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[dieukien] [bit] NOT NULL,
	[mota] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ipf1] [nvarchar](255) NULL,
	[ipf2] [nvarchar](255) NULL,
	[ipf3] [nvarchar](255) NULL,
	[ipf4] [nvarchar](255) NULL,
	[ipf5] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[madonvi_kt] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[laphosotdct]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[laphosotdct](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madktdct] [nvarchar](255) NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[laphosotddf]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[laphosotddf](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madktdct] [nvarchar](255) NULL,
	[kihieudhtd] [nvarchar](255) NULL,
	[madt] [nvarchar](255) NULL,
	[tendanhhieutd] [nvarchar](255) NULL,
	[tenhinhthuckt] [nvarchar](255) NULL,
	[tenloaihinhkt] [nvarchar](255) NULL,
	[thanhtichkhen] [nvarchar](255) NULL,
	[tctang] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlbienban]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlbienban](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mabienban] [nvarchar](255) NOT NULL,
	[sobienban] [nvarchar](255) NULL,
	[ngaythang] [date] NULL,
	[veviec] [nvarchar](255) NULL,
	[noikhenthuong] [nvarchar](255) NULL,
	[phongtrao] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[dieu1] [nvarchar](max) NULL,
	[dieu2] [nvarchar](max) NULL,
	[dieu3] [nvarchar](max) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qldmchi]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qldmchi](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madmchi] [nvarchar](255) NOT NULL,
	[noidung] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qldoituong]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qldoituong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tendt] [nvarchar](255) NULL,
	[ngaysinh] [date] NULL,
	[gioitinh] [nvarchar](255) NULL,
	[diachi] [nvarchar](255) NULL,
	[nguyenquan] [nvarchar](255) NULL,
	[truquan] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[phanloaict] [nvarchar](255) NULL,
	[madinhdanh] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[maccvc] [nvarchar](50) NULL,
	[chucvu] [nvarchar](50) NULL,
	[tendonvi] [nvarchar](50) NULL,
	[lanhdao] [bit] NULL,
	[kihieudhtd] [nvarchar](50) NULL,
	[madanhhieutd] [nvarchar](50) NULL,
	[madt] [nvarchar](50) NULL,
 CONSTRAINT [PK__qldoituo__3213E83FC3F00417] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlhoidap]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlhoidap](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mahoidap] [nvarchar](255) NOT NULL,
	[madonvi] [nvarchar](255) NULL,
	[ngaythang] [date] NULL,
	[noidung] [nvarchar](max) NULL,
	[phanloai] [nvarchar](255) NULL,
	[donvinhan] [nvarchar](255) NULL,
	[cautraloi] [nvarchar](max) NULL,
	[trangthai] [nvarchar](255) NULL,
	[nguoichuyen] [nvarchar](255) NULL,
	[ngaychuyen] [date] NULL,
	[nguoitraloi] [nvarchar](255) NULL,
	[ngaytraloi] [date] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ngaynhan] [date] NULL,
	[lido] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlphieuchi]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlphieuchi](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maphieuchi] [nvarchar](255) NOT NULL,
	[ngaythang] [date] NULL,
	[noidung] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlphieuthu]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlphieuthu](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maphieu] [nvarchar](255) NOT NULL,
	[ngaythang] [date] NULL,
	[noidung] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[nguonhinhthanh] [nvarchar](255) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[loaiphieu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlphongtrao]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlphongtrao](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maphongtrao] [nvarchar](255) NOT NULL,
	[sophongtrao] [nvarchar](255) NULL,
	[ngaythang] [date] NULL,
	[veviec] [nvarchar](255) NULL,
	[noidung] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[dieu1] [nvarchar](max) NULL,
	[dieu2] [nvarchar](max) NULL,
	[dieu3] [nvarchar](max) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlquyetdinh]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlquyetdinh](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maquyetdinh] [nvarchar](255) NOT NULL,
	[soquyetdinh] [nvarchar](255) NULL,
	[mahinhthuckt] [nvarchar](255) NULL,
	[doituong] [nvarchar](255) NULL,
	[mapl] [nvarchar](255) NULL,
	[maplct] [nvarchar](255) NULL,
	[ngaythang] [date] NULL,
	[veviec] [nvarchar](255) NULL,
	[noikhenthuong] [nvarchar](255) NULL,
	[phongtrao] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[dieu1] [nvarchar](max) NULL,
	[dieu2] [nvarchar](max) NULL,
	[dieu3] [nvarchar](max) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlquyetdinhct]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlquyetdinhct](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madt] [nvarchar](255) NULL,
	[maquyetdinh] [nvarchar](255) NULL,
	[tendt] [nvarchar](255) NULL,
	[ngaysinh] [date] NULL,
	[gioitinh] [nvarchar](255) NULL,
	[diachi] [nvarchar](255) NULL,
	[nguyenquan] [nvarchar](255) NULL,
	[truquan] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[phanloaict] [nvarchar](255) NULL,
	[madinhdanh] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlquyetdinhdf]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlquyetdinhdf](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[madt] [nvarchar](255) NULL,
	[maquyetdinh] [nvarchar](255) NULL,
	[tendt] [nvarchar](255) NULL,
	[ngaysinh] [date] NULL,
	[gioitinh] [nvarchar](255) NULL,
	[diachi] [nvarchar](255) NULL,
	[nguyenquan] [nvarchar](255) NULL,
	[truquan] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[phanloaict] [nvarchar](255) NULL,
	[madinhdanh] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qltotrinh]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qltotrinh](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[matotrinh] [nvarchar](255) NOT NULL,
	[sototrinh] [nvarchar](255) NULL,
	[ngaythang] [date] NULL,
	[veviec] [nvarchar](255) NULL,
	[noikhenthuong] [nvarchar](255) NULL,
	[phongtrao] [nvarchar](255) NULL,
	[phanloai] [nvarchar](255) NULL,
	[dieu1] [nvarchar](max) NULL,
	[dieu2] [nvarchar](max) NULL,
	[dieu3] [nvarchar](max) NULL,
	[sotien] [float] NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[qlykien]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[qlykien](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mahiepy] [nvarchar](255) NULL,
	[ykien] [nvarchar](max) NULL,
	[maxa] [nvarchar](255) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[madonvi] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ttnguoitao] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[register]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[register](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[maxa] [nvarchar](30) NULL,
	[mahuyen] [nvarchar](255) NULL,
	[tendn] [nvarchar](255) NULL,
	[diachi] [nvarchar](255) NULL,
	[tel] [nvarchar](255) NULL,
	[fax] [nvarchar](255) NULL,
	[email] [nvarchar](255) NULL,
	[diadanh] [nvarchar](255) NULL,
	[chucdanh] [nvarchar](255) NULL,
	[nguoiky] [nvarchar](255) NULL,
	[noidknopthue] [nvarchar](255) NULL,
	[ghichu] [nvarchar](255) NULL,
	[tailieu] [nvarchar](255) NULL,
	[giayphepkd] [nvarchar](255) NULL,
	[username] [nvarchar](255) NULL,
	[password] [nvarchar](255) NULL,
	[level] [nvarchar](255) NULL,
	[trangthai] [nvarchar](255) NULL,
	[lydo] [nvarchar](max) NULL,
	[ma] [nvarchar](255) NULL,
	[pl] [nvarchar](255) NULL,
	[settingdvvt] [nvarchar](max) NULL,
	[vtxk] [float] NOT NULL,
	[vtxb] [float] NOT NULL,
	[vtxtx] [float] NOT NULL,
	[vtch] [float] NOT NULL,
	[loaihinhhd] [nvarchar](255) NULL,
	[xangdau] [float] NOT NULL,
	[dien] [float] NOT NULL,
	[khidau] [float] NOT NULL,
	[phan] [float] NOT NULL,
	[thuocbvtv] [float] NOT NULL,
	[vacxingsgc] [float] NOT NULL,
	[muoi] [float] NOT NULL,
	[suate6t] [float] NOT NULL,
	[duong] [float] NOT NULL,
	[thocgao] [float] NOT NULL,
	[thuocpcb] [float] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[viewpage]    Script Date: 3/23/2022 5:08:08 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[viewpage](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ip] [nvarchar](255) NULL,
	[session] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[dangkytd] ON 

INSERT [dbo].[dangkytd] ([id], [kihieudhtd], [plphongtrao], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [madonvi], [ttthaotac], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [tungay], [denngay], [phamviapdung]) VALUES (1, N'1647588025', N'SSA_1647588005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'QD01/2022-TDKT', CAST(N'2022-01-01' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, N'2022', N'CC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', N'SSA() thêm mới ', N'Tổ chức phong trào thi đua khen thưởng thường xuyên', 0, 0, CAST(N'2022-03-18T14:22:51.000' AS DateTime), CAST(N'2022-03-18T14:22:51.000' AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[dangkytd] ([id], [kihieudhtd], [plphongtrao], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [madonvi], [ttthaotac], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [tungay], [denngay], [phamviapdung]) VALUES (2, N'1647588482', N'SSA_1647588005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'QD01/2022-PTTD', CAST(N'2022-03-01' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, N'2022', N'CC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', N'SSA() thêm mới ', N'Phong trào thi đua khen thưởng thường xuyên của Xã', 0, 0, CAST(N'2022-03-18T14:28:59.000' AS DateTime), CAST(N'2022-03-18T14:28:59.000' AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[dangkytd] ([id], [kihieudhtd], [plphongtrao], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [madonvi], [ttthaotac], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [tungay], [denngay], [phamviapdung]) VALUES (3, N'1647661712', N'SSA_1647588005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'01', CAST(N'1900-01-01' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, N'2022', N'CC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', N'SSA() thêm mới ', N'', 0, 0, CAST(N'2022-03-19T10:49:45.000' AS DateTime), CAST(N'2022-03-22T11:21:30.000' AS DateTime), CAST(N'2022-03-01' AS Date), CAST(N'2022-12-01' AS Date), NULL)
INSERT [dbo].[dangkytd] ([id], [kihieudhtd], [plphongtrao], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [madonvi], [ttthaotac], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [tungay], [denngay], [phamviapdung]) VALUES (1002, N'1647934468', N'SSA_1647934451', NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'PTCT01/2022-SNV', CAST(N'2022-01-01' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, N'2022', N'CC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'1647424832', N'SSA() thêm mới ', N'Phong trào thi đua cán bộ tiên tiến trên toàn tỉnh Quảng Bình', 0, 0, CAST(N'2022-03-22T14:37:27.000' AS DateTime), CAST(N'2022-03-22T14:37:27.000' AS DateTime), CAST(N'2022-01-01' AS Date), CAST(N'2022-12-31' AS Date), NULL)
SET IDENTITY_INSERT [dbo].[dangkytd] OFF
SET IDENTITY_INSERT [dbo].[dangkytd_khenthuong] ON 

INSERT [dbo].[dangkytd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [soluong], [sotien], [phanloai], [ghichu], [created_at], [updated_at]) VALUES (1004, 1, N'1647934468', N'1647933042', N'Lao động tiên tiến', NULL, NULL, NULL, NULL, 50, NULL, N'CANHAN', NULL, CAST(N'2022-03-23T10:30:37.000' AS DateTime), CAST(N'2022-03-23T10:30:37.000' AS DateTime))
INSERT [dbo].[dangkytd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [soluong], [sotien], [phanloai], [ghichu], [created_at], [updated_at]) VALUES (1005, 1, N'1647934468', N'1647933198', N'Tập thể lao động tiên tiến', NULL, NULL, NULL, NULL, 5, NULL, N'TAPTHE', NULL, CAST(N'2022-03-23T10:30:52.000' AS DateTime), CAST(N'2022-03-23T10:30:52.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[dangkytd_khenthuong] OFF
SET IDENTITY_INSERT [dbo].[dangkytd_tieuchuan] ON 

INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (6, 1, N'1647934468', N'1647933042', N'1647933529', N'Hoàn thành tốt nhiệm vụ được giao, đạt năng suất và chất lượng cao', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:37.000' AS DateTime), CAST(N'2022-03-23T10:30:37.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (7, 1, N'1647934468', N'1647933042', N'1647933617', N'Chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước, có tinh thần tự lực, tự cường; đoàn kết, tương trợ, tích cực tham gia các phong trào thi đua', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:37.000' AS DateTime), CAST(N'2022-03-23T10:30:37.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (8, 1, N'1647934468', N'1647933042', N'1647933632', N'Tích cực học tập chính trị, văn hoá, chuyên môn, nghiệp vụ', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:37.000' AS DateTime), CAST(N'2022-03-23T10:30:37.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (9, 1, N'1647934468', N'1647933042', N'1647933708', N'Có đạo đức, lối sống lành mạnh', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:37.000' AS DateTime), CAST(N'2022-03-23T10:30:37.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (10, 1, N'1647934468', N'1647933198', N'1647934237', N'Hoàn thành tốt nhiệm vụ và kế hoạch được giao', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:52.000' AS DateTime), CAST(N'2022-03-23T10:30:52.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (11, 1, N'1647934468', N'1647933198', N'1647934244', N'Có phong trào thi đua thường xuyên, thiết thực, có hiệu quả', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:52.000' AS DateTime), CAST(N'2022-03-23T10:30:52.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (12, 1, N'1647934468', N'1647933198', N'1647934252', N'Có trên 50% cá nhân trong tập thể đạt danh hiệu “Lao động tiên tiến” và không có cá nhân bị kỷ luật từ hình thức cảnh cáo trở lên', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:52.000' AS DateTime), CAST(N'2022-03-23T10:30:52.000' AS DateTime))
INSERT [dbo].[dangkytd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [tentieuchuandhtd], [cancu], [ghichu], [batbuoc], [ttnguoitao], [created_at], [updated_at]) VALUES (13, 1, N'1647934468', N'1647933198', N'1647934263', N'Nội bộ đoàn kết, chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước', N'', NULL, 1, NULL, CAST(N'2022-03-23T10:30:52.000' AS DateTime), CAST(N'2022-03-23T10:30:52.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[dangkytd_tieuchuan] OFF
SET IDENTITY_INSERT [dbo].[dangkytdct] ON 

INSERT [dbo].[dangkytdct] ([id], [madktdct], [kihieudhtd], [madt], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [created_at], [updated_at]) VALUES (1, N'1647655637', N'1647655632', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-19T09:07:17.000' AS DateTime), CAST(N'2022-03-19T09:07:17.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[dangkytdct] OFF
SET IDENTITY_INSERT [dbo].[dangkytddf] ON 

INSERT [dbo].[dangkytddf] ([id], [madktdct], [kihieudhtd], [madt], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [created_at], [updated_at]) VALUES (1, N'1647576120', N'1647576073', N'', N'Chiến sĩ thi đua toàn quốc', NULL, NULL, NULL, NULL, CAST(N'2022-03-18T11:02:00.000' AS DateTime), CAST(N'2022-03-18T11:02:00.000' AS DateTime))
INSERT [dbo].[dangkytddf] ([id], [madktdct], [kihieudhtd], [madt], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [created_at], [updated_at]) VALUES (2, N'1647576122', N'1647576073', N'', N'Chiến sĩ thi đua toàn quốc', NULL, NULL, NULL, NULL, CAST(N'2022-03-18T11:02:02.000' AS DateTime), CAST(N'2022-03-18T11:02:02.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[dangkytddf] OFF
SET IDENTITY_INSERT [dbo].[dmdanhhieutd] ON 

INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (1, N'CSTD', N'Chiến sĩ thi đua toàn quốc', N'CANHAN', 1, NULL, N'(SSA)17/03/2022 16:01:43', CAST(N'2022-03-17T16:01:43.000' AS DateTime), CAST(N'2022-03-17T16:01:43.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (2, N'1647508703', N'Chiến sĩ thi đua cấp Bộ, ngành, tỉnh, đoàn thể trung ương', N'CANHAN', 1, NULL, NULL, CAST(N'2022-03-17T16:18:23.000' AS DateTime), CAST(N'2022-03-17T16:18:23.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (3, N'1647933042', N'Lao động tiên tiến', N'CANHAN', 1, NULL, NULL, CAST(N'2022-03-22T14:10:42.000' AS DateTime), CAST(N'2022-03-22T14:10:42.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (4, N'1647933054', N'Chiến sĩ tiên tiến', N'CANHAN', 1, NULL, NULL, CAST(N'2022-03-22T14:10:54.000' AS DateTime), CAST(N'2022-03-22T14:10:54.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (5, N'1647933079', N'Cờ thi đua của Chính phủ', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:11:19.000' AS DateTime), CAST(N'2022-03-22T14:11:19.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (6, N'1647933114', N'Cờ thi đua cấp Bộ, ngành, tỉnh, đoàn thể trung ương', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:11:54.000' AS DateTime), CAST(N'2022-03-22T14:11:54.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (7, N'1647933151', N'Tập thể lao động xuất sắc', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:12:31.000' AS DateTime), CAST(N'2022-03-22T14:12:31.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (8, N'1647933178', N'Đơn vị quyết thắng', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:12:58.000' AS DateTime), CAST(N'2022-03-22T14:12:58.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (9, N'1647933198', N'Tập thể lao động tiên tiến', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:13:18.000' AS DateTime), CAST(N'2022-03-22T14:13:18.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (10, N'1647933213', N'Đơn vị tiên tiến', N'TAPTHE', 1, NULL, NULL, CAST(N'2022-03-22T14:13:33.000' AS DateTime), CAST(N'2022-03-22T14:13:33.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (11, N'1647933227', N'Gia đình văn hóa', N'HOGIADINH', 1, NULL, NULL, CAST(N'2022-03-22T14:13:47.000' AS DateTime), CAST(N'2022-03-22T14:13:47.000' AS DateTime), NULL)
INSERT [dbo].[dmdanhhieutd] ([id], [madanhhieutd], [tendanhhieutd], [phanloai], [stt], [ghichu], [ttnguoitao], [created_at], [updated_at], [apdung]) VALUES (12, N'1647933380', N'Chiến sĩ thi đua cơ sở', N'CANHAN', 1, NULL, NULL, CAST(N'2022-03-22T14:16:20.000' AS DateTime), CAST(N'2022-03-22T14:16:20.000' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[dmdanhhieutd] OFF
SET IDENTITY_INSERT [dbo].[dmtieuchuandhtd] ON 

INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (1, N'1647511983', N'Đạt danh hiệu chiến sĩ thi đua cấp Tình 02 lần liên tiếp', N'CSTD', N'Điều 21 luật TĐKT', NULL, NULL, CAST(N'2022-03-17T17:13:03.000' AS DateTime), CAST(N'2022-03-17T17:13:03.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (2, N'1647933332', N'Đạt 03 lần liên tục danh hiệu "Chiến sĩ thi đua cơ sở"', N'1647508703', N'Điều 23 Luật Thi đua khen thưởng', NULL, NULL, CAST(N'2022-03-22T14:15:32.000' AS DateTime), CAST(N'2022-03-22T14:15:32.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (3, N'1647933438', N'Đạt tiêu chuẩn các danh hiệu "Lao động tiên tiến"', N'1647933380', N'Điều 23', NULL, NULL, CAST(N'2022-03-22T14:17:18.000' AS DateTime), CAST(N'2022-03-22T14:17:18.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (4, N'1647933486', N'Có sáng kiến, cải tiến kỹ thuật hoặc áp dụng công nghệ mới để tăng năng suất lao động', N'1647933380', N'Điều 23', NULL, NULL, CAST(N'2022-03-22T14:18:06.000' AS DateTime), CAST(N'2022-03-22T14:18:06.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (5, N'1647933529', N'Hoàn thành tốt nhiệm vụ được giao, đạt năng suất và chất lượng cao', N'1647933042', N'', NULL, NULL, CAST(N'2022-03-22T14:18:49.000' AS DateTime), CAST(N'2022-03-22T14:18:49.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (6, N'1647933617', N'Chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước, có tinh thần tự lực, tự cường; đoàn kết, tương trợ, tích cực tham gia các phong trào thi đua', N'1647933042', N'', NULL, NULL, CAST(N'2022-03-22T14:20:17.000' AS DateTime), CAST(N'2022-03-22T14:20:17.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (7, N'1647933632', N'Tích cực học tập chính trị, văn hoá, chuyên môn, nghiệp vụ', N'1647933042', N'', NULL, NULL, CAST(N'2022-03-22T14:20:32.000' AS DateTime), CAST(N'2022-03-22T14:20:32.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (8, N'1647933708', N'Có đạo đức, lối sống lành mạnh', N'1647933042', N'', NULL, NULL, CAST(N'2022-03-22T14:21:48.000' AS DateTime), CAST(N'2022-03-22T14:21:48.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (9, N'1647933755', N'Hoàn thành tốt nhiệm vụ được giao, đạt năng suất và chất lượng cao', N'1647933054', N'', NULL, NULL, CAST(N'2022-03-22T14:22:35.000' AS DateTime), CAST(N'2022-03-22T14:22:35.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (10, N'1647933763', N'Chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước, có tinh thần tự lực, tự cường; đoàn kết, tương trợ, tích cực tham gia các phong trào thi đua', N'1647933054', N'', NULL, NULL, CAST(N'2022-03-22T14:22:43.000' AS DateTime), CAST(N'2022-03-22T14:22:43.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (11, N'1647933771', N'Tích cực học tập chính trị, văn hoá, chuyên môn, nghiệp vụ', N'1647933054', N'', NULL, NULL, CAST(N'2022-03-22T14:22:51.000' AS DateTime), CAST(N'2022-03-22T14:22:51.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (12, N'1647933778', N'Có đạo đức, lối sống lành mạnh', N'1647933054', N'', NULL, NULL, CAST(N'2022-03-22T14:22:58.000' AS DateTime), CAST(N'2022-03-22T14:22:58.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (13, N'1647933835', N'Có thành tích, hoàn thành vượt mức các chỉ tiêu thi đua và nhiệm vụ được giao trong năm; là tập thể tiêu biểu xuất sắc trong toàn quốc', N'1647933079', N'', NULL, NULL, CAST(N'2022-03-22T14:23:55.000' AS DateTime), CAST(N'2022-03-22T14:23:55.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (14, N'1647933846', N'Có nhân tố mới, mô hình mới tiêu biểu cho cả nước học tập', N'1647933079', N'', NULL, NULL, CAST(N'2022-03-22T14:24:06.000' AS DateTime), CAST(N'2022-03-22T14:24:06.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (15, N'1647933857', N'Nội bộ đoàn kết, đi đầu trong việc thực hành tiết kiệm, chống lãng phí, chống tham nhũng và các tệ nạn xã hội khác', N'1647933079', N'', NULL, NULL, CAST(N'2022-03-22T14:24:17.000' AS DateTime), CAST(N'2022-03-22T14:24:17.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (16, N'1647934045', N'Hoàn thành vượt mức các chỉ tiêu thi đua và nhiệm vụ được giao trong năm; là tập thể tiêu biểu xuất sắc của cấp bộ, ngành, tỉnh, đoàn thể trung ương', N'1647933114', N'', NULL, NULL, CAST(N'2022-03-22T14:27:25.000' AS DateTime), CAST(N'2022-03-22T14:27:25.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (17, N'1647934052', N'Có nhân tố mới, mô hình mới để các tập thể khác thuộc bộ, ngành, cơ quan ngang bộ, cơ quan thuộc Chính phủ, đoàn thể trung ương, tỉnh, thành phố trực thuộc trung ương học tập', N'1647933114', N'', NULL, NULL, CAST(N'2022-03-22T14:27:32.000' AS DateTime), CAST(N'2022-03-22T14:27:32.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (18, N'1647934072', N'Nội bộ đoàn kết, tích cực thực hành tiết kiệm, chống lãng phí, chống tham nhũng và các tệ nạn xã hội khác', N'1647933114', N'', NULL, NULL, CAST(N'2022-03-22T14:27:52.000' AS DateTime), CAST(N'2022-03-22T14:27:52.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (19, N'1647934124', N'Sáng tạo, vượt khó hoàn thành xuất sắc nhiệm vụ, thực hiện tốt các nghĩa vụ đối với Nhà nước', N'1647933151', N'', NULL, NULL, CAST(N'2022-03-22T14:28:44.000' AS DateTime), CAST(N'2022-03-22T14:28:44.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (20, N'1647934132', N'Có phong trào thi đua thường xuyên, thiết thực, hiệu quả', N'1647933151', N'', NULL, NULL, CAST(N'2022-03-22T14:28:52.000' AS DateTime), CAST(N'2022-03-22T14:28:52.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (21, N'1647934146', N'Có 100% cá nhân trong tập thể hoàn thành nhiệm vụ được giao, trong đó có ít nhất 70% cá nhân đạt danh hiệu “Lao động tiên tiến”;', N'1647933151', N'', NULL, NULL, CAST(N'2022-03-22T14:29:06.000' AS DateTime), CAST(N'2022-03-22T14:29:06.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (22, N'1647934153', N'Có cá nhân đạt danh hiệu “Chiến sĩ thi đua cơ sở” và không có cá nhân bị kỷ luật từ hình thức cảnh cáo trở lên', N'1647933151', N'', NULL, NULL, CAST(N'2022-03-22T14:29:13.000' AS DateTime), CAST(N'2022-03-22T14:29:13.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (23, N'1647934160', N'Nội bộ đoàn kết, gương mẫu chấp hành chủ trương, chính sách của Đảng, pháp luật của Nhà nước', N'1647933151', N'', NULL, NULL, CAST(N'2022-03-22T14:29:20.000' AS DateTime), CAST(N'2022-03-22T14:29:20.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (24, N'1647934183', N'Sáng tạo, vượt khó hoàn thành xuất sắc nhiệm vụ, thực hiện tốt các nghĩa vụ đối với Nhà nước', N'1647933178', N'', NULL, NULL, CAST(N'2022-03-22T14:29:43.000' AS DateTime), CAST(N'2022-03-22T14:29:43.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (25, N'1647934190', N'Có phong trào thi đua thường xuyên, thiết thực, hiệu quả', N'1647933178', N'', NULL, NULL, CAST(N'2022-03-22T14:29:50.000' AS DateTime), CAST(N'2022-03-22T14:29:50.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (26, N'1647934198', N'Có 100% cá nhân trong tập thể hoàn thành nhiệm vụ được giao, trong đó có ít nhất 70% cá nhân đạt danh hiệu “Lao động tiên tiến”', N'1647933178', N'', NULL, NULL, CAST(N'2022-03-22T14:29:58.000' AS DateTime), CAST(N'2022-03-22T14:29:58.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (27, N'1647934207', N'Có cá nhân đạt danh hiệu “Chiến sĩ thi đua cơ sở” và không có cá nhân bị kỷ luật từ hình thức cảnh cáo trở lên', N'1647933178', N'', NULL, NULL, CAST(N'2022-03-22T14:30:07.000' AS DateTime), CAST(N'2022-03-22T14:30:07.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (28, N'1647934214', N'Nội bộ đoàn kết, gương mẫu chấp hành chủ trương, chính sách của Đảng, pháp luật của Nhà nước', N'1647933178', N'', NULL, NULL, CAST(N'2022-03-22T14:30:14.000' AS DateTime), CAST(N'2022-03-22T14:30:14.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (29, N'1647934237', N'Hoàn thành tốt nhiệm vụ và kế hoạch được giao', N'1647933198', N'', NULL, NULL, CAST(N'2022-03-22T14:30:37.000' AS DateTime), CAST(N'2022-03-22T14:30:37.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (30, N'1647934244', N'Có phong trào thi đua thường xuyên, thiết thực, có hiệu quả', N'1647933198', N'', NULL, NULL, CAST(N'2022-03-22T14:30:44.000' AS DateTime), CAST(N'2022-03-22T14:30:44.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (31, N'1647934252', N'Có trên 50% cá nhân trong tập thể đạt danh hiệu “Lao động tiên tiến” và không có cá nhân bị kỷ luật từ hình thức cảnh cáo trở lên', N'1647933198', N'', NULL, NULL, CAST(N'2022-03-22T14:30:52.000' AS DateTime), CAST(N'2022-03-22T14:30:52.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (32, N'1647934263', N'Nội bộ đoàn kết, chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước', N'1647933198', N'', NULL, NULL, CAST(N'2022-03-22T14:31:03.000' AS DateTime), CAST(N'2022-03-22T14:31:03.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (33, N'1647934282', N'Hoàn thành tốt nhiệm vụ và kế hoạch được giao', N'1647933213', N'', NULL, NULL, CAST(N'2022-03-22T14:31:22.000' AS DateTime), CAST(N'2022-03-22T14:31:22.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (34, N'1647934288', N'Có phong trào thi đua thường xuyên, thiết thực, có hiệu quả', N'1647933213', N'', NULL, NULL, CAST(N'2022-03-22T14:31:28.000' AS DateTime), CAST(N'2022-03-22T14:31:28.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (35, N'1647934296', N'Có trên 50% cá nhân trong tập thể đạt danh hiệu “Lao động tiên tiến” và không có cá nhân bị kỷ luật từ hình thức cảnh cáo trở lên', N'1647933213', N'', NULL, NULL, CAST(N'2022-03-22T14:31:36.000' AS DateTime), CAST(N'2022-03-22T14:31:36.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (36, N'1647934303', N'Nội bộ đoàn kết, chấp hành tốt chủ trương, chính sách của Đảng, pháp luật của Nhà nước', N'1647933213', N'', NULL, NULL, CAST(N'2022-03-22T14:31:43.000' AS DateTime), CAST(N'2022-03-22T14:31:43.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (37, N'1647934320', N'Gương mẫu chấp hành chủ trương, chính sách của Đảng, pháp luật của Nhà nước; tích cực tham gia các phong trào thi đua của địa phương nơi cư trú', N'1647933227', N'', NULL, NULL, CAST(N'2022-03-22T14:32:00.000' AS DateTime), CAST(N'2022-03-22T14:32:00.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (38, N'1647934327', N'Gia đình hoà thuận, hạnh phúc, tiến bộ; tương trợ giúp đỡ mọi người trong cộng đồng', N'1647933227', N'', NULL, NULL, CAST(N'2022-03-22T14:32:07.000' AS DateTime), CAST(N'2022-03-22T14:32:07.000' AS DateTime), NULL)
INSERT [dbo].[dmtieuchuandhtd] ([id], [matieuchuandhtd], [tentieuchuandhtd], [madanhhieutd], [cancu], [ghichu], [ttnguoitao], [created_at], [updated_at], [stt]) VALUES (39, N'1647934334', N'Tổ chức lao động, sản xuất, kinh doanh, công tác, học tập đạt năng suất, chất lượng và hiệu quả', N'1647933227', N'', NULL, NULL, CAST(N'2022-03-22T14:32:14.000' AS DateTime), CAST(N'2022-03-22T14:32:14.000' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[dmtieuchuandhtd] OFF
SET IDENTITY_INSERT [dbo].[DSDiaBan] ON 

INSERT [dbo].[DSDiaBan] ([id], [madiaban], [tendiaban], [capdo], [ghichu], [madonviQL], [madiabanQL], [created_at], [updated_at]) VALUES (1, N'1647418321', N'Tỉnh Quảng Bình', N'T', NULL, NULL, NULL, CAST(N'2022-03-16T15:12:01.000' AS DateTime), CAST(N'2022-03-16T15:22:16.000' AS DateTime))
INSERT [dbo].[DSDiaBan] ([id], [madiaban], [tendiaban], [capdo], [ghichu], [madonviQL], [madiabanQL], [created_at], [updated_at]) VALUES (2, N'1647419594', N'Thành Phố Đồng Hới', N'H', NULL, NULL, N'1647418321', CAST(N'2022-03-16T15:33:14.000' AS DateTime), CAST(N'2022-03-16T15:33:14.000' AS DateTime))
INSERT [dbo].[DSDiaBan] ([id], [madiaban], [tendiaban], [capdo], [ghichu], [madonviQL], [madiabanQL], [created_at], [updated_at]) VALUES (3, N'1647419829', N'Phường Hải Thành', N'X', NULL, NULL, N'1647419594', CAST(N'2022-03-16T15:37:09.000' AS DateTime), CAST(N'2022-03-16T15:37:09.000' AS DateTime))
INSERT [dbo].[DSDiaBan] ([id], [madiaban], [tendiaban], [capdo], [ghichu], [madonviQL], [madiabanQL], [created_at], [updated_at]) VALUES (4, N'1647419847', N'Phường Đồng Phú', N'X', NULL, NULL, N'1647419594', CAST(N'2022-03-16T15:37:27.000' AS DateTime), CAST(N'2022-03-16T15:37:27.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[DSDiaBan] OFF
SET IDENTITY_INSERT [dbo].[DSDonVi] ON 

INSERT [dbo].[DSDonVi] ([id], [madonvi], [maqhns], [tendonvi], [diachi], [sodt], [cdlanhdao], [lanhdao], [cdketoan], [ketoan], [songuoi], [macqcq], [diadanh], [nguoilapbieu], [madvbc], [capdonvi], [caphanhchinh], [maphanloai], [phanloaixa], [phanloainguon], [linhvuchoatdong], [ngaydung], [chuyendoi], [trangthai], [sotk], [tennganhang], [madinhdanh], [chucnang], [created_at], [updated_at], [madiaban]) VALUES (1, N'1647424832', N'', N'Sở Nội Vụ', N'', NULL, NULL, NULL, NULL, NULL, 0, NULL, N'', NULL, NULL, NULL, N'XA', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-16T17:00:32.000' AS DateTime), CAST(N'2022-03-16T17:00:32.000' AS DateTime), N'1647418321')
INSERT [dbo].[DSDonVi] ([id], [madonvi], [maqhns], [tendonvi], [diachi], [sodt], [cdlanhdao], [lanhdao], [cdketoan], [ketoan], [songuoi], [macqcq], [diadanh], [nguoilapbieu], [madvbc], [capdonvi], [caphanhchinh], [maphanloai], [phanloaixa], [phanloainguon], [linhvuchoatdong], [ngaydung], [chuyendoi], [trangthai], [sotk], [tennganhang], [madinhdanh], [chucnang], [created_at], [updated_at], [madiaban]) VALUES (2, N'1647484671', N'', N'Sở Tài chính', N'', NULL, NULL, NULL, NULL, NULL, 0, NULL, N'', NULL, NULL, NULL, N'XA', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-17T09:37:51.000' AS DateTime), CAST(N'2022-03-17T09:37:51.000' AS DateTime), N'1647418321')
SET IDENTITY_INSERT [dbo].[DSDonVi] OFF
SET IDENTITY_INSERT [dbo].[DSTaiKhoan] ON 

INSERT [dbo].[DSTaiKhoan] ([id], [tentaikhoan], [username], [password], [madonvi], [email], [trangthai], [sadmin], [permission], [ttnguoitao], [lydo], [solandn], [created_at], [updated_at], [tonghop], [hethong], [nhaplieu], [chucnangkhac]) VALUES (1, N'SSA', N'SSA', N'40b2e8a2e835606a91d0b2770e1cd84f', N'SSA', NULL, 1, N'SSA', NULL, NULL, NULL, 0, NULL, CAST(N'2022-03-15T15:40:11.000' AS DateTime), NULL, NULL, NULL, NULL)
INSERT [dbo].[DSTaiKhoan] ([id], [tentaikhoan], [username], [password], [madonvi], [email], [trangthai], [sadmin], [permission], [ttnguoitao], [lydo], [solandn], [created_at], [updated_at], [tonghop], [hethong], [nhaplieu], [chucnangkhac]) VALUES (2, N'Sở Nội vụ', N'sonoivu', N'40b2e8a2e835606a91d0b2770e1cd84f', N'1647424832', NULL, 1, NULL, NULL, NULL, NULL, 1, CAST(N'2022-03-17T09:51:49.000' AS DateTime), CAST(N'2022-03-17T09:51:49.000' AS DateTime), 1, NULL, 1, NULL)
SET IDENTITY_INSERT [dbo].[DSTaiKhoan] OFF
SET IDENTITY_INSERT [dbo].[HeThongChung] ON 

INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (1, NULL, N'Công ty phần mềm LIFE', N'', N'', NULL, NULL, NULL, NULL, N'Hà Nội', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, NULL, CAST(N'2022-03-16T10:58:38.000' AS DateTime))
INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (2, NULL, N'LIFE', N'', N'', NULL, NULL, NULL, NULL, N'LIFE', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, CAST(N'2022-03-16T10:56:29.000' AS DateTime), CAST(N'2022-03-16T10:56:29.000' AS DateTime))
INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (3, NULL, N'Công ty phần mềm LIFE', N'', N'', NULL, NULL, NULL, NULL, N'LIFE', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, CAST(N'2022-03-16T10:56:43.000' AS DateTime), CAST(N'2022-03-16T10:56:43.000' AS DateTime))
INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (4, NULL, N'LIFE', N'1', N'', NULL, NULL, NULL, NULL, N'LIFE', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, CAST(N'2022-03-16T10:56:54.000' AS DateTime), CAST(N'2022-03-16T10:56:54.000' AS DateTime))
INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (5, NULL, N'LIFE', N'', N'', NULL, NULL, NULL, NULL, N'Hà Nội', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, CAST(N'2022-03-16T10:57:09.000' AS DateTime), CAST(N'2022-03-16T10:57:09.000' AS DateTime))
INSERT [dbo].[HeThongChung] ([id], [phanloai], [tendonvi], [maqhns], [diachi], [dienthoai], [thutruong], [ketoan], [nguoilapbieu], [diadanh], [setting], [thongtinhd], [emailql], [tendvhienthi], [tendvcqhienthi], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [solandn], [created_at], [updated_at]) VALUES (6, NULL, N'LIFE', N'', N'', NULL, NULL, NULL, NULL, N'LIFE', NULL, N'', NULL, N'', N'', NULL, NULL, NULL, NULL, NULL, 6, CAST(N'2022-03-16T10:57:35.000' AS DateTime), CAST(N'2022-03-16T10:57:35.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[HeThongChung] OFF
SET IDENTITY_INSERT [dbo].[laphosotd] ON 

INSERT [dbo].[laphosotd] ([id], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [trangthaihuyen], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [ttthaotac], [madonvi], [macqcq], [plphongtrao], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [kihieudhtd]) VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-23' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, NULL, N'CC', NULL, CAST(N'2022-03-23' AS Date), N'Hoàng Văn Anh', NULL, NULL, NULL, NULL, NULL, NULL, N'SSA() thêm mới ', N'1647484671', NULL, NULL, N'Sở Tài chính đăng ký', 0, 0, CAST(N'2022-03-22T16:14:14.000' AS DateTime), CAST(N'2022-03-23T14:21:59.000' AS DateTime), NULL)
INSERT [dbo].[laphosotd] ([id], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [trangthaihuyen], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [ttthaotac], [madonvi], [macqcq], [plphongtrao], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [kihieudhtd]) VALUES (2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-05' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, NULL, N'CD', NULL, CAST(N'2022-03-23' AS Date), N'Trần Văn Nam', NULL, NULL, NULL, NULL, NULL, NULL, N'SSA(SSA) chuyển hồ sơ ', N'1647424832', NULL, NULL, N'Sở Nội vụ đăng ký phong trào thi đua cán bộ tiên tiến trên toàn tỉnh Quảng Bìn', 0, 0, CAST(N'2022-03-23T14:28:42.000' AS DateTime), CAST(N'2022-03-23T14:31:22.000' AS DateTime), N'1647934468')
INSERT [dbo].[laphosotd] ([id], [tendanhhieutd], [tenhinhthuckt], [tendtkt], [phucapld], [chucdanhld], [chucvu], [dvdcct], [soqd], [ngayky], [nguoiky], [tenloaihinhkt], [thanhtichkhen], [namsinh], [chinhquan], [truquan], [ghichu], [tenqt], [macanbo], [maxa], [mahuyen], [tctang], [nam], [trangthai], [trangthaihuyen], [ngaychuyen], [nguoichuyen], [ngaynhan], [lido], [totrinh], [qdkt], [bienban], [tailieukhac], [ttthaotac], [madonvi], [macqcq], [plphongtrao], [noidung], [slcanhan], [sltapthe], [created_at], [updated_at], [kihieudhtd]) VALUES (3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'1900-01-01' AS Date), NULL, NULL, NULL, NULL, NULL, NULL, N'', NULL, NULL, NULL, NULL, NULL, NULL, N'CD', NULL, CAST(N'2022-03-23' AS Date), N'Lê Nam', NULL, N'Chưa phù hợp', NULL, NULL, NULL, NULL, N'SSA(SSA) chuyển hồ sơ ', N'1647484671', NULL, NULL, N'Sở Tài Chính đăng ký phong trào thi đua cán bộ tiên tiến trên toàn tỉnh Quảng Bình', 0, 0, CAST(N'2022-03-23T14:32:13.000' AS DateTime), CAST(N'2022-03-23T15:33:29.000' AS DateTime), N'1647934468')
SET IDENTITY_INSERT [dbo].[laphosotd] OFF
SET IDENTITY_INSERT [dbo].[laphosotd_khenthuong] ON 

INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (1, 1, N'1647934468', N'1647933042', N'CANHAN', N'01', N'0010101', N'Trần Văn Long', CAST(N'1980-03-01' AS Date), N'NAM', N'Giám đốc', 0, N'1647424832', NULL, NULL, CAST(N'2022-03-22T16:11:50.000' AS DateTime), CAST(N'2022-03-23T16:28:53.000' AS DateTime), NULL, NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (2, 1, N'1647934468', N'1647933042', N'CANHAN', N'02', N'010102', N'Hoàng Văn Hải', CAST(N'1985-03-01' AS Date), N'NAM', N'', 0, N'1647424832', NULL, NULL, CAST(N'2022-03-22T16:18:19.000' AS DateTime), CAST(N'2022-03-23T16:28:48.000' AS DateTime), NULL, NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (3, 1, N'1647934468', N'1647933042', N'CANHAN', N'1648002664', N'010103', N'Hoàng Thị Hải', CAST(N'1986-03-01' AS Date), N'NU', N'', 0, N'1647424832', NULL, NULL, CAST(N'2022-03-23T09:31:04.000' AS DateTime), CAST(N'2022-03-23T16:29:03.000' AS DateTime), NULL, NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (5, 1, N'1647934468', N'1647933198', N'TAPTHE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'1647424832', N'Sở Nội Vụ', NULL, CAST(N'2022-03-23T10:35:11.000' AS DateTime), CAST(N'2022-03-23T16:31:18.000' AS DateTime), N'1647424832', NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (1004, 1, N'1647934468', N'1647933042', N'CANHAN', N'1648020054', N'0102001', N'Hoàng Ngọc Long', CAST(N'1985-03-23' AS Date), N'NAM', N'Giám đốc', 1, N'1647484671', NULL, NULL, CAST(N'2022-03-23T14:20:54.000' AS DateTime), CAST(N'2022-03-23T16:29:22.000' AS DateTime), NULL, NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (1005, 1, N'1647934468', N'1647933042', N'CANHAN', N'1648020086', N'0102002', N'Trần Ngọc Anh', CAST(N'1986-04-23' AS Date), N'NAM', N'', 0, N'1647484671', NULL, NULL, CAST(N'2022-03-23T14:21:26.000' AS DateTime), CAST(N'2022-03-23T16:29:25.000' AS DateTime), NULL, NULL, 1)
INSERT [dbo].[laphosotd_khenthuong] ([id], [stt], [kihieudhtd], [madanhhieutd], [phanloai], [madt], [maccvc], [tendt], [ngaysinh], [gioitinh], [chucvu], [lanhdao], [madonvi], [tendonvi], [ghichu], [created_at], [updated_at], [madonvi_kt], [lydo], [ketqua]) VALUES (1006, 1, N'1647934468', N'1647933042', N'CANHAN', N'1648020117', N'0102003', N'Lê Ngọc An', CAST(N'1987-06-23' AS Date), N'NU', N'', 0, N'1647484671', NULL, NULL, CAST(N'2022-03-23T14:21:57.000' AS DateTime), CAST(N'2022-03-23T14:21:57.000' AS DateTime), NULL, NULL, 0)
SET IDENTITY_INSERT [dbo].[laphosotd_khenthuong] OFF
SET IDENTITY_INSERT [dbo].[laphosotd_tieuchuan] ON 

INSERT [dbo].[laphosotd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [madt], [madonvi], [dieukien], [mota], [ghichu], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [created_at], [updated_at], [madonvi_kt]) VALUES (1, 1, N'1647934468', N'1647933042', N'1647933529', N'01', N'1647424832', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-23T09:25:17.000' AS DateTime), CAST(N'2022-03-23T09:25:17.000' AS DateTime), NULL)
INSERT [dbo].[laphosotd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [madt], [madonvi], [dieukien], [mota], [ghichu], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [created_at], [updated_at], [madonvi_kt]) VALUES (2, 1, N'1647934468', N'1647933042', N'1647933617', N'01', N'1647424832', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-23T09:25:48.000' AS DateTime), CAST(N'2022-03-23T09:25:48.000' AS DateTime), NULL)
INSERT [dbo].[laphosotd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [madt], [madonvi], [dieukien], [mota], [ghichu], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [created_at], [updated_at], [madonvi_kt]) VALUES (3, 1, N'1647934468', N'1647933042', N'1647933632', N'01', N'1647424832', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-23T09:26:51.000' AS DateTime), CAST(N'2022-03-23T09:26:51.000' AS DateTime), NULL)
INSERT [dbo].[laphosotd_tieuchuan] ([id], [stt], [kihieudhtd], [madanhhieutd], [matieuchuandhtd], [madt], [madonvi], [dieukien], [mota], [ghichu], [ipf1], [ipf2], [ipf3], [ipf4], [ipf5], [created_at], [updated_at], [madonvi_kt]) VALUES (4, 1, N'1647934468', N'1647933042', N'1647933708', N'01', N'1647424832', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2022-03-23T09:26:55.000' AS DateTime), CAST(N'2022-03-23T09:26:55.000' AS DateTime), NULL)
SET IDENTITY_INSERT [dbo].[laphosotd_tieuchuan] OFF
SET IDENTITY_INSERT [dbo].[laphosotddf] ON 

INSERT [dbo].[laphosotddf] ([id], [madktdct], [kihieudhtd], [madt], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [created_at], [updated_at]) VALUES (1, N'1647940159', N'1647934468', NULL, N'1647933042', NULL, NULL, NULL, NULL, CAST(N'2022-03-22T16:09:19.000' AS DateTime), CAST(N'2022-03-22T16:09:19.000' AS DateTime))
INSERT [dbo].[laphosotddf] ([id], [madktdct], [kihieudhtd], [madt], [tendanhhieutd], [tenhinhthuckt], [tenloaihinhkt], [thanhtichkhen], [tctang], [created_at], [updated_at]) VALUES (2, N'1647940164', N'1647934468', NULL, N'1647933042', NULL, NULL, NULL, NULL, CAST(N'2022-03-22T16:09:24.000' AS DateTime), CAST(N'2022-03-22T16:09:24.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[laphosotddf] OFF
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (78, N'2014_10_12_000000_create_DSTaiKhoan_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (79, N'2016_10_14_022915_create_HeThongChung_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (80, N'2018_05_02_150447_create_viewpage_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (81, N'2018_10_13_092848_create_register_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (82, N'2020_12_10_150524_create_dmdanhhieutd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (83, N'2020_12_10_162211_create_dmtieuchuandhtd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (84, N'2020_12_14_093658_create_dmhinhthuckt_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (85, N'2020_12_14_101830_create_dmloaihinhthuckt_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (86, N'2020_12_17_163509_create_chongphapcanhan_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (87, N'2020_12_21_142453_create_chongmycanhan_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (88, N'2020_12_23_144213_create_chongmygiadinh_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (89, N'2020_12_23_144254_create_ktthutuong_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (90, N'2020_12_23_144313_create_ktctubnd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (91, N'2020_12_23_144334_create_kyniemchuong_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (92, N'2020_12_28_110156_create_hiepykhenthuong_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (93, N'2020_12_30_090102_create_qlphieuthu_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (94, N'2021_01_04_142814_create_dangkytd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (95, N'2021_01_04_162131_create_dmquoctich_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (96, N'2021_01_07_083925_create_laphosotd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (97, N'2021_01_08_092022_create_qlphieuchi_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (98, N'2021_01_08_094911_create_qldmchi_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (99, N'2021_04_13_091905_create_qlhoidap_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (100, N'2021_04_13_153747_create_DSDonVi_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (101, N'2021_07_06_102358_create_qlquyetdinh_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (102, N'2021_07_06_110438_create_qltotrinh_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (103, N'2021_07_06_111247_create_qlbienban_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (104, N'2021_07_06_140831_create_qlphongtrao_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (105, N'2021_07_06_152702_create_qlykien_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (106, N'2021_07_12_153803_create_qldoituong_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (107, N'2021_07_12_161258_create_dmphanloaidt_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (108, N'2021_07_13_084904_create_dmphanloaict_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (109, N'2021_07_22_151746_create_dmphanloaiqd_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (110, N'2021_08_18_103316_create_qlquyetdinhct_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (111, N'2021_08_18_152639_create_qlquyetdinhdf_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (112, N'2022_01_04_095212_create_dangkytdct_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (113, N'2022_01_06_143754_create_dangkytddf_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (114, N'2022_01_12_105438_create_laphosotddf_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (115, N'2022_01_12_105453_create_laphosotdct_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (116, N'2022_03_15_111256_create_DSDiaBan_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (119, N'2022_03_18_143601_create_dangkytd_khenthuong_table', 2)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (120, N'2022_03_18_143728_create_dangkytd_tieuchuan_table', 2)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1117, N'2022_03_22_091436_create_laphosotd_khenthuong_table', 3)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1118, N'2022_03_22_091453_create_laphosotd_tieuchuan_table', 3)
SET IDENTITY_INSERT [dbo].[migrations] OFF
SET IDENTITY_INSERT [dbo].[qldoituong] ON 

INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (1, N'Trần Văn Long', CAST(N'1980-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:01:13.000' AS DateTime), CAST(N'2022-03-23T17:01:13.000' AS DateTime), N'0010101', N'Giám đốc', NULL, 0, N'1647934468', N'1647933042', NULL)
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (2, N'Hoàng Văn Hải', CAST(N'1985-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:01:13.000' AS DateTime), CAST(N'2022-03-23T17:01:13.000' AS DateTime), N'010102', N'', NULL, 0, N'1647934468', N'1647933042', NULL)
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (3, N'Hoàng Thị Hải', CAST(N'1986-03-01' AS Date), N'NU', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:01:13.000' AS DateTime), CAST(N'2022-03-23T17:01:13.000' AS DateTime), N'010103', N'', NULL, 0, N'1647934468', N'1647933042', NULL)
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (5, N'Trần Văn Long', CAST(N'1980-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:22.000' AS DateTime), CAST(N'2022-03-23T17:02:22.000' AS DateTime), N'0010101', N'Giám đốc', NULL, 0, N'1647934468', N'1647933042', N'01')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (6, N'Hoàng Văn Hải', CAST(N'1985-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:22.000' AS DateTime), CAST(N'2022-03-23T17:02:22.000' AS DateTime), N'010102', N'', NULL, 0, N'1647934468', N'1647933042', N'02')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (7, N'Hoàng Thị Hải', CAST(N'1986-03-01' AS Date), N'NU', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:22.000' AS DateTime), CAST(N'2022-03-23T17:02:22.000' AS DateTime), N'010103', N'', NULL, 0, N'1647934468', N'1647933042', N'1648002664')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (8, N'Trần Văn Long', CAST(N'1980-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), N'0010101', N'Giám đốc', NULL, 0, N'1647934468', N'1647933042', N'01')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (9, N'Hoàng Văn Hải', CAST(N'1985-03-01' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), N'010102', N'', NULL, 0, N'1647934468', N'1647933042', N'02')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (10, N'Hoàng Thị Hải', CAST(N'1986-03-01' AS Date), N'NU', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), N'010103', N'', NULL, 0, N'1647934468', N'1647933042', N'1648002664')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (11, NULL, NULL, NULL, NULL, NULL, NULL, N'TAPTHE', NULL, NULL, N'1647424832', NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), NULL, NULL, N'Sở Nội Vụ', NULL, N'1647934468', N'1647933198', NULL)
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (12, N'Hoàng Ngọc Long', CAST(N'1985-03-23' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), N'0102001', N'Giám đốc', NULL, 1, N'1647934468', N'1647933042', N'1648020054')
INSERT [dbo].[qldoituong] ([id], [tendt], [ngaysinh], [gioitinh], [diachi], [nguyenquan], [truquan], [phanloai], [phanloaict], [madinhdanh], [madonvi], [ttnguoitao], [created_at], [updated_at], [maccvc], [chucvu], [tendonvi], [lanhdao], [kihieudhtd], [madanhhieutd], [madt]) VALUES (13, N'Trần Ngọc Anh', CAST(N'1986-04-23' AS Date), N'NAM', NULL, NULL, NULL, N'CANHAN', NULL, NULL, NULL, NULL, CAST(N'2022-03-23T17:02:40.000' AS DateTime), CAST(N'2022-03-23T17:02:40.000' AS DateTime), N'0102002', N'', NULL, 0, N'1647934468', N'1647933042', N'1648020086')
SET IDENTITY_INSERT [dbo].[qldoituong] OFF
SET IDENTITY_INSERT [dbo].[qlphongtrao] ON 

INSERT [dbo].[qlphongtrao] ([id], [maphongtrao], [sophongtrao], [ngaythang], [veviec], [noidung], [phanloai], [dieu1], [dieu2], [dieu3], [sotien], [maxa], [mahuyen], [ghichu], [ttnguoitao], [madonvi], [created_at], [updated_at]) VALUES (1, N'SSA_1647588005', N'PTX01/2022', CAST(N'2022-01-01' AS Date), N'Phong trào thi đua cấp Xã', N'Phong trào thi đua thường xuyên cấp xã', N'XA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', CAST(N'2022-03-18T14:20:05.000' AS DateTime), CAST(N'2022-03-18T14:20:05.000' AS DateTime))
INSERT [dbo].[qlphongtrao] ([id], [maphongtrao], [sophongtrao], [ngaythang], [veviec], [noidung], [phanloai], [dieu1], [dieu2], [dieu3], [sotien], [maxa], [mahuyen], [ghichu], [ttnguoitao], [madonvi], [created_at], [updated_at]) VALUES (2, N'SSA_1647934419', N'PTH', CAST(N'2022-01-01' AS Date), N'Phong trào thi đua cấp Huyện', N'Phong trào thi đua cấp Huyện', N'HUYEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', CAST(N'2022-03-22T14:33:39.000' AS DateTime), CAST(N'2022-03-22T14:33:39.000' AS DateTime))
INSERT [dbo].[qlphongtrao] ([id], [maphongtrao], [sophongtrao], [ngaythang], [veviec], [noidung], [phanloai], [dieu1], [dieu2], [dieu3], [sotien], [maxa], [mahuyen], [ghichu], [ttnguoitao], [madonvi], [created_at], [updated_at]) VALUES (3, N'SSA_1647934451', N'PTCT', CAST(N'2022-01-01' AS Date), N'Phong trào thi đua cấp Tỉnh', N'Phong trào thi đua cấp Tỉnh', N'TINH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'SSA', CAST(N'2022-03-22T14:34:11.000' AS DateTime), CAST(N'2022-03-22T14:34:11.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[qlphongtrao] OFF
SET IDENTITY_INSERT [dbo].[viewpage] ON 

INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (1, N'127.0.0.1', N'kAoUQtov60p4pXrlgfmfbPrw079oi2mbcHH53BbI', CAST(N'2022-03-15T15:01:04.000' AS DateTime), CAST(N'2022-03-15T15:01:04.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (2, N'127.0.0.1', N'kXz4QYpbgUr1gtk3qF77jWZEYpuViMFJmH9qyxli', CAST(N'2022-03-15T15:33:23.000' AS DateTime), CAST(N'2022-03-15T15:33:23.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (3, N'127.0.0.1', N'V2LevFL1u6rWbwCNDceknOuRw2u2PMaeb0rP1heE', CAST(N'2022-03-16T10:20:18.000' AS DateTime), CAST(N'2022-03-16T10:20:18.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (4, N'127.0.0.1', N'j9qgK436rV3vdw4L6wMobc0dqblutUCZO00BGzg3', CAST(N'2022-03-16T15:00:13.000' AS DateTime), CAST(N'2022-03-16T15:00:13.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (5, N'127.0.0.1', N'0SMihh7bfLqe2yKnifyeNvBTXaXQj14JebPn5vte', CAST(N'2022-03-17T09:13:48.000' AS DateTime), CAST(N'2022-03-17T09:13:48.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (6, N'127.0.0.1', N'xmrnoi98GCCTiLWvBSoQdcko6C2TBNKK6s4Aajhp', CAST(N'2022-03-17T14:15:16.000' AS DateTime), CAST(N'2022-03-17T14:15:16.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (7, N'127.0.0.1', N'toE015LzYkiLEkkfEw8mlxc6Q208gi6gLAx39Yzb', CAST(N'2022-03-18T08:26:17.000' AS DateTime), CAST(N'2022-03-18T08:26:17.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (8, N'127.0.0.1', N'bUH05HZfnrLzIk79VdG5kQYbGchYyGC5VMSCm3y5', CAST(N'2022-03-18T09:33:55.000' AS DateTime), CAST(N'2022-03-18T09:33:55.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (9, N'127.0.0.1', N'aclGHlmW0ZiMnVuMvwRSKTwfOixDBA6Iu1rYXjvD', CAST(N'2022-03-18T10:51:00.000' AS DateTime), CAST(N'2022-03-18T10:51:00.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (10, N'127.0.0.1', N'SNSpeRCXfqL4M15249kuewLJSlYPwtXH3pmvlYFW', CAST(N'2022-03-18T14:13:15.000' AS DateTime), CAST(N'2022-03-18T14:13:15.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (11, N'127.0.0.1', N'1jFmT6ijEWxu92D29QFagRsNNwURDW6g0IbyxAaL', CAST(N'2022-03-18T14:13:15.000' AS DateTime), CAST(N'2022-03-18T14:13:15.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (12, N'127.0.0.1', N'W7F9iJoNrMiej4RijNgjLrdbg7OkR0vYoSklnDbl', CAST(N'2022-03-19T08:17:01.000' AS DateTime), CAST(N'2022-03-19T08:17:01.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (1006, N'127.0.0.1', N'R9j8CQwEw7pUQEt2RjcuMIbDCfPNCDPIb8MKkyhh', CAST(N'2022-03-21T09:50:46.000' AS DateTime), CAST(N'2022-03-21T09:50:46.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (2006, N'127.0.0.1', N'Ev2RTzzmecq08EunajAzQ0uPMdValQGoJtPKg7mv', CAST(N'2022-03-21T14:27:09.000' AS DateTime), CAST(N'2022-03-21T14:27:09.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (3006, N'127.0.0.1', N'HtPvLn89xJlIjsMDR9IgcRtbSKHaaJGZpmIhaXUF', CAST(N'2022-03-22T08:30:09.000' AS DateTime), CAST(N'2022-03-22T08:30:09.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (4006, N'127.0.0.1', N'sC05NvHf06Lw9k00H1Pq0YF4QV14mkRnYGZEybHi', CAST(N'2022-03-22T14:09:43.000' AS DateTime), CAST(N'2022-03-22T14:09:43.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (4007, N'127.0.0.1', N'JWsqdvaV3MCA4XnrEAb7FhfmXBSpn05e1SjTqV74', CAST(N'2022-03-23T08:07:27.000' AS DateTime), CAST(N'2022-03-23T08:07:27.000' AS DateTime))
INSERT [dbo].[viewpage] ([id], [ip], [session], [created_at], [updated_at]) VALUES (5006, N'127.0.0.1', N'foJS5b8MSSLsjC36WDniaAsj6TYy0dyajihySYYZ', CAST(N'2022-03-23T13:53:01.000' AS DateTime), CAST(N'2022-03-23T13:53:01.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[viewpage] OFF
ALTER TABLE [dbo].[dangkytd] ADD  DEFAULT ('0') FOR [slcanhan]
GO
ALTER TABLE [dbo].[dangkytd] ADD  DEFAULT ('0') FOR [sltapthe]
GO
ALTER TABLE [dbo].[dangkytd_khenthuong] ADD  DEFAULT ('1') FOR [stt]
GO
ALTER TABLE [dbo].[dangkytd_tieuchuan] ADD  DEFAULT ('1') FOR [stt]
GO
ALTER TABLE [dbo].[dangkytd_tieuchuan] ADD  DEFAULT ('0') FOR [batbuoc]
GO
ALTER TABLE [dbo].[dmdanhhieutd] ADD  CONSTRAINT [DF_dmdanhhieutd_stt]  DEFAULT ((1)) FOR [stt]
GO
ALTER TABLE [dbo].[DSDonVi] ADD  CONSTRAINT [DF__DSDonVi__songuoi__43A1090D]  DEFAULT ('0') FOR [songuoi]
GO
ALTER TABLE [dbo].[DSDonVi] ADD  CONSTRAINT [DF__DSDonVi__caphanh__44952D46]  DEFAULT ('XA') FOR [caphanhchinh]
GO
ALTER TABLE [dbo].[DSDonVi] ADD  CONSTRAINT [DF__DSDonVi__chuyend__4589517F]  DEFAULT ('0') FOR [chuyendoi]
GO
ALTER TABLE [dbo].[DSDonVi] ADD  CONSTRAINT [DF_DSDonVi_chucnangkhac1]  DEFAULT ((0)) FOR [madiaban]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  DEFAULT ('0') FOR [trangthai]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  DEFAULT ('1') FOR [solandn]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  CONSTRAINT [DF_DSTaiKhoan_tonghop]  DEFAULT ((0)) FOR [tonghop]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  CONSTRAINT [DF_DSTaiKhoan_hethong]  DEFAULT ((0)) FOR [hethong]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  CONSTRAINT [DF_DSTaiKhoan_nhaplieu]  DEFAULT ((0)) FOR [nhaplieu]
GO
ALTER TABLE [dbo].[DSTaiKhoan] ADD  CONSTRAINT [DF_DSTaiKhoan_chucnangkhac]  DEFAULT ((0)) FOR [chucnangkhac]
GO
ALTER TABLE [dbo].[HeThongChung] ADD  DEFAULT ('6') FOR [solandn]
GO
ALTER TABLE [dbo].[laphosotd] ADD  CONSTRAINT [DF__laphosotd__slcan__3A179ED3]  DEFAULT ('0') FOR [slcanhan]
GO
ALTER TABLE [dbo].[laphosotd] ADD  CONSTRAINT [DF__laphosotd__sltap__3B0BC30C]  DEFAULT ('0') FOR [sltapthe]
GO
ALTER TABLE [dbo].[laphosotd_khenthuong] ADD  DEFAULT ('1') FOR [stt]
GO
ALTER TABLE [dbo].[laphosotd_khenthuong] ADD  CONSTRAINT [DF_laphosotd_khenthuong_ketqua]  DEFAULT ((0)) FOR [ketqua]
GO
ALTER TABLE [dbo].[laphosotd_tieuchuan] ADD  DEFAULT ('1') FOR [stt]
GO
ALTER TABLE [dbo].[laphosotd_tieuchuan] ADD  DEFAULT ('0') FOR [dieukien]
GO
ALTER TABLE [dbo].[qldoituong] ADD  CONSTRAINT [DF_qldoituong_lanhdao]  DEFAULT ((0)) FOR [lanhdao]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [vtxk]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [vtxb]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [vtxtx]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [vtch]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [xangdau]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [dien]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [khidau]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [phan]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [thuocbvtv]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [vacxingsgc]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [muoi]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [suate6t]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [duong]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [thocgao]
GO
ALTER TABLE [dbo].[register] ADD  DEFAULT ('0') FOR [thuocpcb]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "DSDiaBan"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 180
               Right = 208
            End
            DisplayFlags = 280
            TopColumn = 1
         End
         Begin Table = "DSDonVi"
            Begin Extent = 
               Top = 6
               Left = 246
               Bottom = 197
               Right = 426
            End
            DisplayFlags = 280
            TopColumn = 28
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'view_DiaBan_DonVi'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'view_DiaBan_DonVi'
GO
